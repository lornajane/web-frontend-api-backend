<?php

class EventModel {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getSomeEvents() {
        // get all future events
        $sql = "select ID, event_name, event_loc, event_desc
            from events
            where event_start > :start
            order by event_start
            limit 10";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(array("start" => mktime(0,0,0)));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

}
