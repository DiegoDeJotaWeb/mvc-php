<?php
class Login
{
    private $userName;
    private $userEmail;
    private $userPass;
    private $userHash;
    // private $userStatus;

    // Set e Get do userName

    public function setUserName(String $userName)
    {
        return $this->userName = $userName;
    }

    public function getUserName(String $userName)
    {
        return $this->userName;
    }


    // Set e Get do userEmail
    public function setUserEmail(String $userEmail)
    {
        return $this->userEmail = $userEmail;
    }

    public function getUserEmail(String $userEmail)
    {
        return $this->userEmail;
    }

    // Set e Get do userEmail
    public function setUserPass(String $userPass, String $userEmail)
    {
        $senhaMd5 = (md5($userPass));
        $loginMd5 = (md5($userEmail));
        $apiKeyMd5 = (md5('maça'));

        $passCryt = (md5($apiKeyMd5 . $senhaMd5 . $loginMd5));

        $passUser = $userEmail;

        $custo = '09';

        $salt = $passCryt;

        $cryptoPass = crypt($passUser, '$2b$' . $custo . '$' . $salt . '$');

        return $this->userPass = $cryptoPass;
    }

    public function getUserPass(String $userPass)
    {
        return $this->userPass;
    }

    public function setUserHash(String $userPass, String $userEmail)
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

    public function getUserHash(String $userHash)
    {
        return $this->userHash;
    }

    function addLogin(String $fxLogin)
    {
        require '../../db/conn.php';

        $sqlQuery = "SELECT usuario, email FROM LOGIN_DIEGO WHERE usuario = '$this->userName' OR email = '$this->userEmail'";
        $emailBD = "";
        $userNameBD = "";


        if ($result = mysqli_query($conn, $sqlQuery)) {
            while ($row = mysqli_fetch_row($result)) {
                $emailBD = $row[1];
                $userNameBD = $row[2];
            }
            mysqli_free_result($result);
        }
        if (($emailBD ===  $this->userEmail) || ($userNameBD ===  $this->userName)) {
            $retorna = [
                'status' => false,
                'userName' => $this->userName,
                'userEmail' => $this->userEmail,
                'msg' => "<p style='color=#f00'>ERRO - Usuário já cadastrado"
            ];
        } else {
            $querySQL = "INSERT INTO LOGIN_DIEGO (idLogin, email, usuario, senha, hash, status) 
            VALUES 
            (Null, '$this->userEmail', '$this->userName', '$this->userPass', '$this->userHash', '1')";

            // if ($conn->query($querySQL)) {
            if (mysqli_query($conn, $querySQL)) {
                // echo "Sucesso";
                $retorna = [
                    'status' => true,
                    'userName' => $this->userName,
                    'userEmail' => $this->userEmail,
                    'msg' => "<p style='color=#0f0'>Usuário cadastrado com sucesso!!"
                ];
            } else {
                // echo "Error: " . $querySQL . "<br>" . $conn->error;
                $retorna = [
                    'status' => false,
                    'userName' => $this->userName,
                    'userEmail' => $this->userEmail,
                    'msg' => "<p style='color=#f00'>ERRO - Usuário não cadastrado!!"
                ];
            }
        }

        $conn->close();
        return $this->fxLogin = $retorna;
    }
}
