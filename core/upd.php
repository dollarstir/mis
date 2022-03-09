<?php

class Upd extends Database
{
    public function update($table, $records, $target)
    {
        try {
            $vu = '';
            foreach ($records as $key => $value) {
                $vu .= $key.'= :'.$key.',';
            }
            $vu = rtrim($vu, ',');
            $up = $this->conn->prepare("UPDATE $table SET $vu WHERE $target");
            var_dump($up);
            foreach ($records as $key => $value) {
                $up->bindValue(':'.$key, $value);
            }
            if ($up->execute()) {
                $msg = 'Updated Successfully';
            } else {
                $msg = 'Update Failed';
            }
        } catch (PDOException $e) {
            $msg = 'ERROR: '.$e->getMessage();
        }

        return $msg;
    }
}
