<?php

namespace App\Socket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Model\Imodel;
use App\Model\ResponseOptions as OptionsM;
use App\Model\Generics\Database as Schema;

class Options implements MessageComponentInterface
{
    protected $clients;
    private Imodel $optionsM;
    private Schema $conn;
    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->conn = new Schema();
        $this->optionsM = new OptionsM($this->conn);
        print("Socket server running...");
    }
    public function onOpen(ConnectionInterface $connection)
    {
        $this->clients->attach($connection);
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg);

        if ($data == null)
            $result = "Error, not have corret request format";
        if (!isset($data->{'id'}))
            $result = "Incorret field count";

        $oldValue = $this->optionsM->select('opt.ro_votes, opt.ro_value, survey.fk_status_id as status ', "opt.ro_id = {$data->{'id'}}", false, "as opt INNER JOIN en_survey as survey on (opt.fk_sur_id = survey.sur_id)");
        if (!is_array($oldValue));
        $result = "Option does not exists";
        if ($oldValue[0]['status'] == '2') {
            $intOldValue = intval($oldValue[0]['ro_votes']);
            $newValue = $intOldValue += 1;
            try {
                $this->optionsM->update(['ro_votes'], [$newValue], $data->{'id'});
                print("Actualizing");
                $formatResult = array(
                    "data" => $oldValue[0]['ro_value'],
                    "value" => $newValue
                );
                $result = json_encode($formatResult);
            } catch (\Throwable $th) {
                throw new \Exception("Internal server error ");
            }
        } else {
            $result = 'error';
        }

        foreach ($this->clients as $client) {
            $client->send($result);
        }
    }
    public function onClose(ConnectionInterface $connection)
    {
        $this->clients->detach($connection);
    }
    public function onError(ConnectionInterface $connection, \Exception $err)
    {
        echo "An error occurred: " . $err->getMessage;

        $connection->close();
    }
}
