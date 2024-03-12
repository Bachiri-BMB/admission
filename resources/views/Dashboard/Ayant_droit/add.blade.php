<div class="modal fade" id="addBeneficiaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Ayant droit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('patients.store_beneficiary', $patient->id) }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nom">Nom</label>
                        <input type="text" name="Nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Prénom">Prénom</label>
                        <input type="text" name="Prénom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Date_naissance">Date de naissance</label>
                        <input type="date" name="Date_naissance" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Sexe">Sexe</label>
                        <select name="Sexe" class="form-control" required>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Lien_parenté">Lien de parenté</label>
                        <select name="Lien_parenté" class="form-control" required>
                            <option value="Ascendant">Ascendant</option>
                            <option value="Descendant">Descendant</option>
                            <option value="Conjoint">Conjoint</option>
                            <option value="Enfant">Enfant</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
