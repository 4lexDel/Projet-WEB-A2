<div style="text-align: -webkit-center;">
    <div style="background: white;display: flex; width: 50%;justify-content: center;flex-direction: column;text-align: center;">
        <form style="margin: 1em;">
            <div class="mb-3">
                <label for="company" class="form-label">Nom de l'Entreprise</label>
                <input type="text" class="form-control" id="company" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="nbCESIStudent" class="form-label">Nombre de stagiaires</label>
                <input type="text" class="form-control" id="nbCESIStudent">
            </div>
            <div class="mb-3">
                <label for="eMail" class="form-label">Email Entreprise</label>
                <input type="email" class="form-control" id="eMail">
            </div>
            <div class="mb-3">
                <label for="descCompany" class="form-label">Description Entreprise</label>
                <textarea name="descCompany" class="form-control" id="descCompany" style="resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"' maxlength="500"></textarea>
            </div>
            <div class="mb-3 form-check" style="display: flex;justify-content: center;">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1" style="margin-left: 1em;">  Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>