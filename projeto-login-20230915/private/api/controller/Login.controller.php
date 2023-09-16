<?php

class Login
{
    private $userName;
    private $userEmail;
    private $userPass;
    private $userHash;
    private $userStatus;
    // Set e get do userName
    public function setUserName(string $userName)
    {
        return $this->userName = $userName;
    }
    public function getUserName(string $userName)
    {
        return $this->userName;
    }

    public function setUserEmail(string $userEmail)
    {
        return $this->userEmail = $userEmail;
    }
    public function getUserEmail(string $userEmail)
    {
        return $this->userEmail;
    }
    public function setUserStatus(int $userStatus)
    {
        return $userStatus = 1;
    }
    public function getUserStatus(int $userStatus)
    {
        return $this->userStatus;
    }
    
    public function setUserPass(string $userPass, string $userEmail)
    {
        $senhaMd5 = (md5($userPass));
        $loginMd5 = (md5($userEmail));
        $apiKeyMd5 = (md5('maçã'));

        $passCryt = (md5($apiKeyMd5 . $senhaMd5 . $loginMd5));
        $passUser = $userEmail;
        $custo = '09';
        $salt = $passCryt;

        $cryptoPass = crypt($passUser, '$2b$' . $custo . '$' . $salt . '$');

        return $this->userPass = $cryptoPass;
    }
    public function getUserPass(string $userPass)
    {
        return $this->userPass;
    }
    public function setUserHash(string $userPass, string $userEmail)
    {
        $senhaHmd5 = (md5($userPass));
        $emailHmd5 = (md5($userEmail));
        $apiKeyHmd5 = (md5('banana'));

        $hashPass = (md5($senhaHmd5 . $emailHmd5 . $apiKeyHmd5));
        $passHash = $senhaHmd5;
        $custo = '08';
        $salt = $hashPass;

        $cryptoHash = crypt($passHash, '$2b$' . $custo . '$' . $salt . '$');

        return $this->userHash = $cryptoHash;
    }
    public function getUserHash(string $userHash)
    {
        return $this->userHash;
    }
    public function addLogin(string $fxLogin)
    {
        require '../../db/conn.php';

        $sqlQuery = "SELECT usuario, email FROM LOGIN_THIAGO WHERE usuario = '$this->userName' OR email = '$this->userEmail'";

        $emailBD = "";
        $userNameBD = "";

        if ($result = mysqli_query($conn, $sqlQuery)) {
            while ($row = mysqli_fetch_row($result)) {
                $emailBD = $row[0];
                $userNameBD = $row[1];
            }
            mysqli_free_result($result);
        }
        if (($emailBD === $this->userEmail || $userNameBD === $this->userName)) {
            $retorna = [
                'status' => false,
                'userName' => $this->userName,
                'userEmail' => $this->userEmail,
                'msg' => "<p style='color: #f00'>ERRO - Usuário já cadastrado</p>"
            ];
        } else {
            $querySQL = "INSERT INTO LOGIN_THIAGO (idLogin, email, usuario, senha, hash, status) VALUES (null, '$this->userEmail', '$this->userName','$this->userPass', '$this->userHash', '$this->userStatus' )";

            if (mysqli_query($conn, $querySQL)) {
                $retorna = [
                    'status' => true,
                    'userName' => $this->userName,
                    'userEmail' => $this->userEmail,
                    'msg' => "<p style='color: #0f0'>Usuário cadastrado com sucesso</p>"
                ];
            } else {
                $retorna = [
                    'status' => false,
                    'userName' => $this->userName,
                    'userEmail' => $this->userEmail,
                    'msg' => "<p style='color: #f00'>ERRO - Usuário não cadastrado</p>"
                ];
            }
        }
        $conn->close();

        return $this->fxLogin = $retorna;
    }
}
?>