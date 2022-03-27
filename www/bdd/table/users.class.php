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
                    <a href="candidature.php?delete=1&page=' . $row . '" >
                    <button type="button" class="btn btn-primary">Retirer
                    </button></a>
                    </div>
                    <li style="display: inline;"></li>
                    </div>
                    <div style="margin: 1em;">
                    <p>';

                    $desc .= $description . '  Nombre de poste --> ' . $nb_place;
                    $name = $nom;
                } else {
                    $display = '';
                }

                $string .= '
                <a href="candidature.php?page=' . $row . '" class="list-group-item list-group-item-action ' . $display . ' py-3 lh-tight" aria-current="true">
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
                $stmt = $sqlClient->prepare("INSERT INTO users(userSecondName, userFirstName, login, password, idRole) VALUES(?, ?, ?, ?, ?); ");

                $stmt->bindValue(1, "$secondName");
                $stmt->bindValue(2, "$firstName");
                $stmt->bindValue(3, "$login");
                $stmt->bindValue(4, "$mdp");
                $stmt->bindValue(5, $role);             //A CONTINUER §§§§§§§§§§§§§§§§§§§

                //echo "ROLE : $role";

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
            /* delete save from id_user and row from this sql query -->
            
           SELECT save.idInternship , save.idUser
            FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = 101 limit 1 offset 1;
            */
            $stmt = $sqlClient->prepare("DELETE FROM save
            WHERE idInternship = ( SELECT save.idInternship
            FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = " . $_SESSION['idUser'] . " limit 1 offset " . $id_page . ") 
            AND idUser = ( SELECT save.idUser
            FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = " . $_SESSION['idUser'] . " limit 1 offset " . $id_page . ")");

            /*
            echo $id_page;
            echo $_SESSION['idUser'];

            $stmt->bindValue(1, $_SESSION['idUser']);
            $stmt->bindValue(2, $id_page);
            $stmt->bindValue(3, $_SESSION['idUser']);
            $stmt->bindValue(4, $id_page);
*/
            $stmt->execute();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postuler(&$sqlClient, $cv, $lettre_de_motivation, $id_page)
    {
        try {

            echo "In user postuler";

            $stmt = $sqlClient->prepare("INSERT INTO `applyfor`(`idUser`, `idInternship`, `cv`, `coverLetter`)
            VALUES(
                (" . $_SESSION['idUser'] . "),
                (SELECT save.idInternship FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = " . $_SESSION['idUser'] . " limit 1 offset " . $id_page . "),
                ('?'),
                ('?')
            );");

            $stmt->bindValue(1, $cv);
            $stmt->bindValue(2, $lettre_de_motivation);

            echo ($_SESSION["idUser"]);
            echo ($id_page);
            echo ($cv);
            echo ($lettre_de_motivation);

            $stmt->execute();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addToWishList(&$sqlClient, $id)
    {
        try {
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
}
