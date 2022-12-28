<?php
include 'utils/databaseUtil.php';
include 'enums/UserType.php';

class Authenticate {
    public static function authenticateUser($username, $password) {
        if($username == SUPER_ADMIN && $password == SUPER_ADMIN){
            return array(
                'ACCOUNT'   => $username,
                'NAME'      => 'SUPPER ADMIN',
                'ROLE'      => UserType::ADMIN
            );
        }
        //query get user
        $db = DatabaseUtil::getConn();
        $query = "SELECT * FROM users WHERE active = 1 AND user_name = :username AND password = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();
        //no account return null
        if(!$users) return null;

        foreach ($users as $user){
            if (!in_array($user['role_id'], array(UserType::ADMIN, UserType::STUDENT))) return null;
            return array(
                'ACCOUNT'   => $username,
                'NAME'      => $user['full_name'],
                'ROLE'      => $user['role_id']
            );
        }
    }
}

?>