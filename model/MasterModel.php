<?php

    include '../lib/conf/Connection.php';

    class MasterModel extends Connection {

        public function insert($sql) {
            $result=mysqli_query($this->getConnect(), $sql);
            return $result;
        }
        public function consult($sql) {
            $result=mysqli_query($this->getConnect(), $sql);
            return $result;
        }
        public function update($sql) {
            $result=mysqli_query($this->getConnect(), $sql);
            return $result;
        }
        public function delete($sql) {
            $result=mysqli_query($this->getConnect(), $sql);
            return $result;
        }
        public function autoincrement($table, $field) {
            $sql="SELECT MAX($field) FROM $table";
            $result=$this->consult($sql);
            $count=mysqli_fetch_row($result);

            return $count[0]+1;
        }
        public function numberOfPages($table, $limit) {
            $sql = "SELECT * FROM $table";
            $result = $this->consult($sql);
            $numberOfResults = mysqli_num_rows($result);

            $pages = ceil($numberOfResults/$limit);
            return $pages;
        }
    }
?>