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
            $stmt = $sqlClient->prepare("SELECT users.idUser, userSecondName, userFirstName, role.idRole, role.role, schoolYear.idSchoolYear, schoolYear.schoolYear 
            FROM users INNER JOIN belong ON users.idUser = belong.idUser 
            INNER JOIN schoolYear ON belong.idSchoolYear = schoolYear.idSchoolYear 
            INNER JOIN role ON users.idRole = role.idRole
            WHERE userSecondName like ? AND userFirstName like ? AND schoolYear.schoolYear like ? AND role.role = ?");

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







    public function select_wish_list_from_user(&$sqlClient, &$string, &$desc, &$name)
    {
        try {

            $user_id = $_SESSION['idUser'];

            $stmt = $sqlClient->prepare('SELECT `intership`,`startDate`,`endDate`,`releaseDate`,`nbPlace`,`descInternship`,`company` FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = ?;');

            $stmt->bindParam(1, $user_id);

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            //$nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $string = '';
            if (isset($_GET["page"])) {
                $active = $_GET["page"];
            } else {
                $active = 0;
            }

            for ($row = 0; $row < $nbRow; $row++) {
                $nom = $data[$row][0];
                $date_start = $data[$row][1];
                $date_end = $data[$row][2];
                $date_relase = $data[$row][3];
                $nb_place = $data[$row][4];
                $description = $data[$row][5];
                $brand = $data[$row][6];

                if ($active == $row) {

                    $display = 'active';

                    $desc .= '<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Postuler</button>
                    <input type="hidden"  name="nb_page" value="' . $row . '" >
                    </div> 
                    </form>
                    </div>
                    </div>
                    </div>
                    <a href="candidature.php?wish=1&delete=1&page=' . $row . '" >
                    <button type="button" class="btn btn-primary">Retirer
                    </button></a>
                    </div>
                    <li style="display: inline;"></li>
                    </div>
                    <div style="margin: 1em;">
                    <p>';

                    $desc .= $description . '<br> Nombre de poste : ' . $nb_place;
                    $name = $nom;
                } else {
                    $display = '';
                }

                $string .= '
                <a href="candidature.php?wish=1&page=' . $row . '" class="list-group-item list-group-item-action ' . $display . ' py-3 lh-tight" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">' . $nom . '</strong>
                        <small>' . $brand . '</small>
                    </div>
                <div class="col-10 mb-1 small">Début ' . $date_start . ' Fin ' . $date_end . ' Publié le ' . $date_relase . '</div>
                </a>';
            }
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

            $data = $stmt->fetchAll();

            //print_r($data);

            $nbRow = $stmt->rowCount();           //Contenu des tables

            $stmt->closeCursor();

            if ($nbRow > 0) {
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
                $stmt->bindValue(5, $role);

                $stmt->execute();

                $stmt->closeCursor();
            } else {
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
                $stmt = $sqlClient->prepare("INSERT INTO users(userSecondName, userFirstName, login, password, idRole) VALUES(?, ?, ?, ?, ?);");

                $stmt->bindValue(1, "$secondName");
                $stmt->bindValue(2, "$firstName");
                $stmt->bindValue(3, "$login");
                $stmt->bindValue(4, "$mdp");
                $stmt->bindValue(5, $role);

                $stmt->execute();
                $stmt->closeCursor();

                $stmt = $sqlClient->prepare("INSERT INTO belong(idUser, idSchoolYear) VALUES(?, ?); ");

                echo "test id : " . $this->getUserId($sqlClient, $login);
                echo "school id : " . $promo;

                $stmt->bindValue(1, $this->getUserId($sqlClient, $login));
                $stmt->bindValue(2, $promo);

                $stmt->execute();
                $stmt->closeCursor();
            } else {
                $userCreated = -2;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function getUserId(&$sqlClient, $login)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * 
            FROM users
            WHERE login = ?");

            $stmt->bindValue(1, "$login");

            $stmt->execute();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();

            return $data[0]["idUser"];
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function delete_save(&$sqlClient, $id_page)
    {
        try {


            $stmt = $sqlClient->prepare("DELETE FROM save
            WHERE idInternship = ( SELECT save.idInternship
            FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = ? limit 1 offset ?) 
            AND idUser = ( SELECT save.idUser
            FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = ? limit 1 offset ?)");


            $stmt->bindValue(1, $_SESSION['idUser']);
            $stmt->bindValue(2, (int) $id_page, PDO::PARAM_INT);
            $stmt->bindValue(3, $_SESSION['idUser']);
            $stmt->bindValue(4, (int) $id_page, PDO::PARAM_INT);

            $stmt->execute();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function postuler(&$sqlClient, $cv, $lettre_de_motivation, $id_page)
    {
        try {
            //session_start();


            $stmt = $sqlClient->prepare("INSERT INTO `applyfor`(`idUser`, `idInternship`, `cv`, `coverLetter`)
            VALUES(
                (?),
                (SELECT save.idInternship FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = ? limit 1 offset ?),
                (?),
                (?)
            );");

            $stmt->bindValue(1, $_SESSION['idUser']);
            $stmt->bindValue(2, $_SESSION['idUser']);
            $stmt->bindValue(3, (int) $id_page, PDO::PARAM_INT);

            $stmt->bindValue(4, $cv);
            $stmt->bindValue(5, $lettre_de_motivation);

            $stmt->execute();

            $stmt->closeCursor();

            $this->delete_save($sqlClient, $id_page);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addToWishList(&$sqlClient, $id)
    {
        try {
            session_start();

            $stmt = $sqlClient->prepare("SELECT * FROM save WHERE idUser = ? AND idInternship = ?");
            $stmt->bindValue(1, $_SESSION['idUser']);
            $stmt->bindValue(2, "$id");
            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables

            $stmt->closeCursor();

            if ($nbRow == 0) {
                $stmt = $sqlClient->prepare("INSERT INTO save (idUser, idInternship) VALUES(?, ?)");

                $stmt->bindValue(1, $_SESSION['idUser']);
                $stmt->bindValue(2, "$id");
                $stmt->execute();

                $data = $stmt->fetchAll();

                $stmt->closeCursor();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteUser(&$sqlClient, $id)
    {
        echo "go";
        try {
            $stmt = $sqlClient->prepare(
                "DELETE FROM evaluate where idUser = ?"
            );
            $stmt->bindValue(1, "$id");                         //evaluate      EVALUATE/ BELONG/ APPLYFOR/ SAVE
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM belong where idUser = ?"
            );                                                  //belong
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM applyFor where idUser = ?"          //applyFor
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM save where idUser = ?"       //save
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "UPDATE schoolYear SET idUser = null WHERE idUser = ?"       //user
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "UPDATE company SET idUser = null WHERE idUser = ?"       //user
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM users where idUser = ?"       //user
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }






    public function select_candidature_from_user(&$sqlClient, &$string, &$desc, &$name)
    {
        try {

            $user_id = $_SESSION['idUser'];

            $stmt = $sqlClient->prepare('SELECT `intership`,`startDate`,`endDate`,`releaseDate`,`nbPlace`,`descInternship`,`company`,applyfor.cv,applyfor.coverLetter,applyfor.step FROM `intership` INNER JOIN `applyfor` ON intership.idInternship = applyfor.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE applyfor.idUser = ?;');

            $stmt->bindParam(1, $user_id);

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            //$nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $string = '';
            if (isset($_GET["page_candi"])) {
                $active = $_GET["page_candi"];
            } else {
                $active = 0;
            }

            for ($row = 0; $row < $nbRow; $row++) {
                $nom = $data[$row][0];
                $date_start = $data[$row][1];
                $date_end = $data[$row][2];
                $date_relase = $data[$row][3];
                $nb_place = $data[$row][4];
                $description = $data[$row][5];
                $brand = $data[$row][6];
                $cv = $data[$row][7];
                $cover_letter = $data[$row][8];
                $step = $data[$row][9];

                if ($active == $row) {

                    $display = 'active';

                    $desc .= '<div style="display:flex;justify-content: flex-start; margin-left: 1em;margin-top: 1em;">
                <img src="../assets/img/stage.png" alt="Stage.png" width="100px">
                <h1 display="inline" style="margin-left: 1em;">' . $nom . '</h1>
            </div>
            <div style="display:flex;justify-content: space-evenly;margin-top: 1em;">
                    <div>
                    <a href="candidature.php?wish=1&delete=1&page_candi=' . $row . '" >
                    <button type="button" class="btn btn-primary">Retirer
                    </button></a>
                    </div>
                <li style="display: inline;">Statut : '. $step .'</li>
            </div>
            <div style="margin: 1em;">
                <p>


                    
                ';

                    $desc .= $description . '<br>  Nombre de poste : ' . $nb_place;
                    $desc .= '<br>Mon CV : '.$cv.'<br> Ma lettre de Motivation : '.$cover_letter;

                } else {
                    $display = '';
                }

                $string .= '
            <a href="candidature.php?wish=0&page_candi=' . $row . '" class="list-group-item list-group-item-action ' . $display . ' py-3 lh-tight" aria-current="true">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">' . $nom . '</strong>
                    <small>' . $brand . '</small>
                </div>
            <div class="col-10 mb-1 small">Début ' . $date_start . ' Fin ' . $date_end . ' Publié le ' . $date_relase . '</div>
            </a>';
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete_candidature_save(&$sqlClient, $id_page)
    {
        try {


            $stmt = $sqlClient->prepare("DELETE FROM applyfor
            WHERE idInternship = ( SELECT applyfor.idInternship
            FROM `intership` INNER JOIN `applyfor` ON intership.idInternship = applyfor.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE applyfor.idUser = ? limit 1 offset ?) 
            AND idUser = ( SELECT applyfor.idUser
            FROM `intership` INNER JOIN `applyfor` ON intership.idInternship = applyfor.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE applyfor.idUser = ? limit 1 offset ?)");


            $stmt->bindValue(1, $_SESSION['idUser']);
            $stmt->bindValue(2, (int) $id_page, PDO::PARAM_INT);
            $stmt->bindValue(3, $_SESSION['idUser']);
            $stmt->bindValue(4, (int) $id_page, PDO::PARAM_INT);

            $stmt->execute();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getUserInfos(&$sqlClient, &$data, &$nbRow, &$nbCol){
        try {
            $stmt = $sqlClient->prepare(
                "SELECT users.idUser, userSecondName, userFirstName, login, password, idRole, schoolyear.idSchoolYear, schoolYear from users
                LEFT JOIN belong on belong.idUser=users.idUser
                LEFT JOIN schoolyear on schoolyear.idSchoolYear=belong.idSchoolYear
                WHERE users.idUser = ?
                ");
            
            $stmt->bindValue(1, $_SESSION['idUser']);

            $stmt->execute();

            $data = $stmt->fetchAll();
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    



}// end user class