<div class="modal fade" id="ModalCenterUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-success">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">
               <img ng-src="{{Candidatephoto}}" ng-hide="Candidatephoto == null || Candidatephoto == '' "
                        ng-show="Candidatephoto != null " class="img-thumbnail mr-3" alt="Candidate_image"
                        style="width:200px;height:200px;">
                    </div>
                        <div class="col-lg-4">
                        
                        </div>
                </div>
                <br/>
                <br/>
                <div class="row">
                    <label class="col-form-label">Upload Candidate Image</label>
                    <div class="input-group">
                        <input type="file" class="form-control" ng-model="clearinput01" id="fileInput01"
                            accept="image/*" name=files[] ng-model="Candidatephotoupload">
                        <div class="input-group-append">
                            <p id="fileButton01" class="input-group-text"><i class="fa fa-upload"></i>
                            </p>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>