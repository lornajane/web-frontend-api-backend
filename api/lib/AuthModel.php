<?php

class AuthModel {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAccessTokenFromCreds($username, $password) {
        $sql = "select ID, username, password from user "
            . "where username = :username and password = :password ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(array("username" => $username,
            "password" => md5($password)));
        $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

        // would be neat to store consumer also
        $token_sql = "insert into oauth_access_tokens set "
            . "user_id = :user_id, access_token = :token ";

        $time = gettimeofday();
        $token = sha1($time['usec']);
        $token_stmt = $this->db->prepare($token_sql);
        $token_stmt->execute(array("user_id" => $user_info['ID'],
            "token" => $token));

        return $token;

    }
}
