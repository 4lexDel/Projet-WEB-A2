<?php
if (!isset($_SESSION["AUTH"])) {
    if (isset($_POST["company"], $_POST["eMail"], $_POST["descCompany"])) {
        echo $_POST["company"].'<br>';
        echo $_POST["eMail"].'<br>';
        echo $_POST["descCompany"].'<br>';
        
    }
}
?>
<div style="text-align: -webkit-center;">
    <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
        <form style="margin: 1em;" method="post">
            <div class="mb-3">
                <label for="company" class="form-label">Nom de l'Entreprise</label>
                <input name="company" type="text" class="form-control" id="company" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="eMail" class="form-label">Email Entreprise</label>
                <input name="eMail" type="email" class="form-control" id="eMail">
            </div>
            <div class="mb-3">
                <label for="descCompany" class="form-label">Description Entreprise</label>
                <textarea name="descCompany" class="form-control" id="descCompany" style="resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"' maxlength="400"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer !</button>
        </form>
    </div>
</div>