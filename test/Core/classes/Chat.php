<?php
class chat extends core {
    public function fetchmsg($f_user,$t_user) {
        $this->query("
            SELECT `msg`.`message`,`msg`.`msg_id`,`Users`.`fname`,`Users`.`ID` 
            FROM `msg` 
            JOIN `Users` 
            ON (Users.ID = msg.f_init_id) 
            WHERE (`msg`.`f_init_id`='".(int)$f_user."' AND `msg`.`f_recv_id`='".(int)$t_user."') OR (`msg`.`f_init_id`='".(int)$t_user."' AND `msg`.`f_recv_id`='".(int)$f_user."') 
            ORDER BY `msg`.`msg_id` DESC
        ");
        return $this->rows();
    }
    public function throwmsg( $f_user, $msg, $t_user) {
        $this->query("
            INSERT into `msg` (`f_init_id`,`message`,`f_recv_id`,`time`)
            VALUES (".(int)$f_user.",'".$this->db->real_escape_string(htmlentities($msg))."',".(int)$t_user.",UNIX_TIMESTAMP())
        ");
    }
}
?>