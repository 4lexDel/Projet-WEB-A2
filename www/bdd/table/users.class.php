<?php

class Users
{

    public function __construct()
    {
    }

    public function selectUsers()
    {
    }

    public function selectUsersLogin(&$sqlClient, &$data, &$nbRow, &$nbCol, $login, $password)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM users NATURAL JOIN role WHERE login=? AND password=?");

            $stmt->bindParam(1, $login);
            $stmt->bindParam(2, $password);

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            /*echo "Ligne : " . $nbRow . " Colonne : " . $nbCol;
            echo "<br>";
            print_r($data);*/

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function selectUsersSearch(&$sqlClient, &$data, &$nbRow, &$nbCol, $role, $secondName, $firstName, $schoolYear)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * 
            FROM users
            INNER JOIN belong ON users.idUser = belong.idUser 
            INNER JOIN schoolYear ON belong.idSchoolYear = schoolYear.idSchoolYear 
            INNER JOIN role ON users.idRole = role.idRole 
            WHERE userSecondName like ? AND userFirstName like ? AND schoolYear like ? AND role = ?");

            $stmt->bindValue(1, "%$secondName%");
            $stmt->bindValue(2, "%$firstName%");
            $stmt->bindValue(3, "%$schoolYear%");
            $stmt->bindValue(4, "$role");

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function select_wish_list_from_user(&$sqlClient, &$string)
    {
        try {
            echo "hfhjgfhgfhfhgfhgfhgfhg";
            $user_id = $_SESSION['idUser'];

            $stmt = $sqlClient->prepare('SELECT `intership`,`startDate`,`endDate`,`releaseDate`,`nbPlace`,`descInternship`,`company` FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = ?;');

            $stmt->bindParam(1, $user_id);

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();



            // retourne le save des offres des satges en prenant en compte le user 



            //print_r ($data);
            for ($row = 0; $row < $nbRow; $row++) {
                for ($col = 0; $col < $nbCol; $col++) {

                    echo $data[$row][$col];
                }
            }

            $string = '';

            for ($row = 0; $row < $nbRow; $row++) {
                $nom = $data[$row][1];
                $date_start = $data[$row][2];
                $date_end = $data[$row][3];
                $date_relase = $data[$row][4];
                $nb_place = $data[$row][5];
                $description = $data[$row][6];
                $brand = $data[$row][7];

                $string .= '<a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">' + $nom + '</strong>
                                <small>' + $brand + '</small>
                            </div>
                            <div class="col-10 mb-1 small">Début ' + $date_start + ' Fin ' + $date_end + ' Publié le ' + $date_relase + '</div>
                        </a>
            
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">Titre</strong>
                                <small class="text-muted">Element 2</small>
                            </div>
                            <div class="col-10 mb-1 small">Texte Descriptif</div>
                        </a>';
            }


            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function userExist(&$sqlClient, $login)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM users WHERE login = ?");
            $stmt->bindValue(1, "$login");
            $stmt->execute();

            $nbCol = $stmt->columnCount();

            $stmt->closeCursor();

            if ($nbCol > 0) {
                return true;
            }

            return false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function insertUser(&$sqlClient, $secondName, $firstName, $login, $mdp, $role, &$userCreated)
    {
        try {
            if (!$this->userExist($sqlClient, $login)) {
                $stmt = $sqlClient->prepare("INSERT INTO users(userSecondName, userFirstName, login, password, idRole) VALUES(?, ?, ?, ?, ?); ");

                $stmt->bindValue(1, "$secondName");
                $stmt->bindValue(2, "$firstName");
                $stmt->bindValue(3, "$login");
                $stmt->bindValue(4, "$mdp");
                $stmt->bindValue(5, "$role");

                $stmt->execute();

                $stmt->closeCursor();
            }
            else{
                $userCreated = -2;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function insertUserInPromo(&$sqlClient, $secondName, $firstName, $login, $mdp, $promo, $role, &$userCreated)
    {
        try {
            if (!$this->userExist($sqlClient, $login)) {
                $stmt = $sqlClient->prepare("INSERT INTO users(userSecondName, userFirstName, login, password, idRole) VALUES(?, ?, ?, ?, ?); ");

                $stmt->bindValue(1, "$secondName");
                $stmt->bindValue(2, "$firstName");
                $stmt->bindValue(3, "$login");
                $stmt->bindValue(4, "$mdp");
                $stmt->bindValue(5, "$role");

                $stmt->execute();

                $stmt->closeCursor();
                echo $promo;
            }
            else{
                $userCreated = -2;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
