<div style="text-align: -webkit-center;">
    <div style="background: white;display: flex; width: 50%;justify-content: center;flex-direction: column;text-align: center;">
        <form style="margin: 1em;">
            <div class="mb-3">
                <label for="company" class="form-label">Entreprise</label>
                <select class="form-control" id="company">
                    <option value="company1">company1</option>
                    <option value="company2">company2</option>
                    <!--Récupérer les entreprises de la personne et les injecter la dedans-->
                    <!--Donc faut faire un script php avec la bdd-->
                </select>
            </div>
            <div class="mb-3">
                <label for="internship" class="form-label">Nom du Stage</label>
                <input type="text" class="form-control" id="internship" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="StartDate" class="form-label">Date début</label>
                <input type="date" class="form-control" id="StartDate">
            </div>
            <div class="mb-3">
                <label for="EndDate" class="form-label">Date Fin</label>
                <input type="date" class="form-control" id="EndDate">
            </div>
            <div class="mb-3">
                <label for="WageMonth" class="form-label">Salaire Mensuel</label>
                <input type="number" class="form-control" id="WageMonth">
            </div>
            <div class="mb-3">
                <label for="nbPlace" class="form-label">Nombre de place</label>
                <input type="number" class="form-control" id="nbPlace">
            </div>
            <div class="mb-3">
                <label for="descInternship" class="form-label">Description Stage</label>
                <textarea class="form-control" id="descInternship" style="resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"' maxlength="400"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>