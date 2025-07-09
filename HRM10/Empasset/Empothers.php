<div class="card" ng-show="btnotherinformation">
    <h5 class="card-header text-green">Personal Information</h5>
    <div class="card-body">


        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label">Languages</label>
                    <ul class="pl-0">
                        <li ng-repeat="p in GetLanguageList" style=" list-style-type: none;">
                            <input type="checkbox" ng-model="selected[p.Languages]" value="{{p.Languages}}" />
                            <span>{{p.Languages}}</span>
                    </ul>
                    </li>
                </div>
            </div>
            <div class="col-md-10">

                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="col-form-label">DOB</label>
                        <input type="text" class="form-control" ng-model="Dob" onfocus="(this.type='date')"
                            onblur="(this.type='date')" ng-change="Getage();">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Age</label>
                        <input type="text" class="form-control" ng-model="Age" autocomplete="off" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Blood Group</label>
                        <select class="form-control" ng-model="Bloodgroup">
                            <option ng-repeat="s in GetBloodGroupList " value="{{s.BloodGroup}}">
                                {{s.BloodGroup}}</option>

                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Experience</label>
                        <input type="text" class="form-control" ng-model="Expereience" autocomplete="off">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Fresher</label>
                        <select class="form-control" ng-model="Fresher">
                            <option Value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Date Of Joining</label>
                        <input type="text" class="form-control" ng-model="Date_Of_Joing" onfocus="(this.type='date')"
                            onblur="(this.type='date')">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Shift</label>
                        <select ng-model="Shift" class="form-control">
                            <option ng-repeat="s in GetShiftList " value="{{s.Shift}}">
                                {{s.Shift}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">OT Applicability</label>

                        <input type="text" class="form-control" ng-model="AllowOT" autocomplete="off" readonly
                            ng-show="Clientid!=4">
                        <select class="form-control" ng-model="AllowOT" ng-show="Clientid==4">
                            <option Value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>

                    </div>
                    <!-- <div class="form-group col-md-3">
                        <label class="col-form-label">Allow LOP</label>
                        <select class="form-control" ng-model="AllowLOP">
                            <option Value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div> -->

                    <div class="form-group col-md-3" ng-show="Clientid==4">
                        <label class="col-form-label">Essl ID</label>
                        <input type="text" class="form-control" ng-model="Old_Empid"
                            ng-model-options='{ debounce: 1000 }' ng-change="GETESSLCODE()" placeholder="Enter Essl id"
                            autocomplete="off">
                    </div>

                    <!-- <div class="form-group col-md-3">
                                                                <label class="col-form-label">Salary_Mode</label>
                                                                <select class="form-control" ng-model="Salary_Mode">
                                                                    <option Value="Bank">Bank</option>
                                                                    <option value="Cash">Cash</option>


                                                                </select>
                                                            </div> -->
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Weekly Off</label>
                        <select class="form-control" ng-model="Weekoff">
                            <option Value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option Value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option Value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option Value="Saturday">Saturday</option>



                        </select>
                    </div>
                    <!-- <div class="form-group col-md-3">
                        <label class="col-form-label">Employee_CL</label>
                        <input type="text" class="form-control" ng-model="Employee_CL" autocomplete="off">
                    </div> -->

                    <div class="form-group col-md-3">
                        <label class="col-form-label">UAN No</label>
                        <input class="form-control" autocomplete="off" ng-model="UANno"
                            onkeypress="return Validate(event);" />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">ESI No </label>
                        <input class="form-control" autocomplete="off" ng-model="ESIno" />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Aadhar No</label>
                        <input type="text" class="form-control" ng-model="Aadharno" autocomplete="off"
                            onkeypress="return Validate(event);">
                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">PAN No</label>
                        <input class="form-control" autocomplete="off" ng-model="Panno" />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">PF Joining Date</label>
                        <input type="text" class="form-control" ng-model="PFJoiningdate" onfocus="(this.type='date')"
                            onblur="(this.type='date')">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">ESI Joining Date </label>
                        <input type="text" class="form-control" ng-model="ESIJoiningdate" onfocus="(this.type='date')"
                            onblur="(this.type='date')">
                    </div>

                    <div class="form-group col-md-6" ng-show="btnverification">
                        <label class="col-form-label">Background Verification
                            Document
                        </label>
                        <div class="input-group">
                            <input type="file" class="form-control" ng-model="clearinput"
                                id="fileInputBackgroundVerification" name=files[] accept="application/pdf">
                            <div class="input-group-append">
                                <p id="fileButtonBackgrounverification" class="input-group-text">
                                    <i class="fa fa-upload"></i>
                                </p>
                                <p class="input-group-text" ng-click="FetchEmployee(Employeeid);" data-toggle="modal"
                                    data-target="#ModalCenter1EMPBackgroundView">
                                    <i class="fa fa-file"></i>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-3" ng-show="btnverification">
                        <label class="col-form-label">Background Verification
                            Done</label>
                        <select class="form-control" ng-model="BackgroundVerification">
                            <option Value="Yes">Yes</option>
                            <option value="No">No</option>




                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Official Mail ID </label>
                        <input type="email" class="form-control" ng-model="OfficemailID" autocomplete="email"
                            ng-model-options='{ debounce: 1000 }' ng-change="emailchecking(OfficemailID)">
                    </div>
                    <div class="form-group col-md-6">

                        <div class="mt-25 text-right">
                            <button class="btn btn-sm btn-success" ng-click="Update_Other_info();"><i
                                    class="fa fa-save"></i> Update</button>

                        </div>

                    </div>

                </div>

            </div>
        </div>


    </div>
</div>

<div class="card" ng-show="btnaddress">
    <h5 class="card-header text-green">Permanent and Temporary Address Detail
    </h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-green">Temporary Address Detail</h5>
                <div class="emp-adrbox">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Address</label>
                            <input class="form-control" ng-model="CurrentAddress" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Country</label>
                            <select ng-model="CurrentCountry" ng-change="GetCurrentState();" class="form-control">
                                <option ng-repeat="s in GetCountryList " value="{{s.Country}}">
                                    {{s.Country}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">State</label>
                            <select ng-model="CurrentState" class="form-control" ng-change="GetCurrentCity();">
                                <option ng-repeat="s in GetStateList " value="{{s.State}}">
                                    {{s.State}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">City</label>
                            <select ng-model="CurrentCity" class="form-control">
                                <option ng-repeat="s in GetCityList " value="{{s.City}}">
                                    {{s.City}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Pincode</label>
                            <input class="form-control" ng-model="CurrentPincode" />
                        </div>

                    </div>

                </div>
                <div class="form-group  text-right mt-3">
                    <button class="btn btn-sm btn-warning" ng-click="CopyTempAddress();">
                        <i class="fa fa-copy"></i> Copy Address </button>
                </div>

            </div>
            <div class="col-md-6">
                <h5 class="text-green">Permanent Address Details</h5>
                <div class="emp-adrbox">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Address</label>
                            <input class="form-control" ng-model="PermanentAddress" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Country</label>
                            <select ng-model="PermanentCountry" ng-change="GetPerstate();" class="form-control">
                                <option ng-repeat="s in GetCountryList " value="{{s.Country}}">
                                    {{s.Country}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">State</label>
                            <select ng-model="PermanentState" ng-change="GetPerCity();" class="form-control">
                                <option ng-repeat="s in GetPerStateList " value="{{s.State}}">
                                    {{s.State}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">City</label>
                            <select ng-model="PermanentCity" class="form-control">
                                <option ng-repeat="s in GetPerCityList " value="{{s.City}}">
                                    {{s.City}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Pincode</label>
                            <input class="form-control" ng-model="PermanentPincode" />
                        </div>
                    </div>
                </div>
                <div class="form-group text-right mt-3">
                    <button class="btn btn-sm btn-success" ng-click="UpdateAddress();">
                        <i class="fa fa-save"></i> Update </button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card" ng-show="btnbank">
    <h5 class="card-header text-green">Bank Account Details</h5>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label class="col-form-label">Bank Name</label>
                <input class="form-control" ng-model="Bankname" autocomplete="off" id="Bankname" />
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label">Account Holder Name</label>
                <input class="form-control" ng-model="Empnameaspassbook" autocomplete="off" id="Empnameaspassbook" />
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label">Account No</label>
                <input class="form-control" ng-model="Accountno" autocomplete="off" id="Accountno" />
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label">IFSC Code</label>
                <input class="form-control" ng-model="IFSCcode" autocomplete="off" id="IFSCcode"
                    ng-change="GetIFSCexists();" />
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label">Branch</label>
                <input class="form-control" ng-model="Branch" autocomplete="off" id="Branch" />
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label">Passbook</label>
                <div class="input-group">
                    <input type="file" class="form-control" ng-model="clearinput" id="fileInput03" name=files[]
                        accept="image/png, image/gif, image/jpeg,application/pdf">
                    <div class="input-group-append">
                        <p id="fileButton03" class="input-group-text">
                            <i class="fa fa-upload"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <span class="required">NOTE : {{BankMessage}}</span>
            </div>
            <div class="col-md-12 mt-2">
                <iframe ng-src="{{Emppassbook}}" ng-hide="Emppassbook == null || Emppassbook == '' "
                    ng-show="Emppassbook != null " style="height:350px;width:100%" frameborder="0"
                    allowfullscreen></iframe>
            </div>
            <div class="form-group text-right col-md-12">
                <button class="btn btn-sm mt-25 btn-success" ng-click="UpdateBank();">
                    <i class="fa fa-save"></i> Update </button>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="btnEducation">
    <h5 class="card-header text-green">Employee Education Details</h5>
    <div class="card-body">
        <div class="row">
            <div class="table-responsive custom-table custom-table-noborder col-lg-4">
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>
                            <label class="col-form-label">S.No</label>
                        </td>
                        <td>
                            <input class="form-control" ng-model="EduNextno" id="EduNextno" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="col-form-label">Studied</label>
                        </td>
                        <td>
                            <select ng-model="Employeestudied" class="form-control" id="Employeestudied">
                                <option ng-repeat="s in GetQualififcationList" value="{{s.Degree}}">
                                    {{s.Degree}}
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="col-form-label">Education Mode</label>
                        </td>
                        <td>
                            <select ng-model="EducationMode" id="EducationMode" class="form-control">

                                <option ng-repeat="s in GetEducationModeList " value="{{s.EducationMode}}">
                                    {{s.EducationMode}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="col-form-label">Specialization</label>
                        </td>
                        <td>
                            <select ng-model="Specialization" id="Specialization" class="form-control">

                                <option ng-repeat="s in GetSpecializationList " value="{{s.Specialization}}">
                                    {{s.Specialization}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="col-form-label">University/School</label>
                        </td>
                        <td>
                            <input class="form-control" ng-model="UniversityorSchool" id="UniversityorSchool"
                                autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="col-form-label">Grade / %</label>
                        </td>
                        <td>
                            <input class="form-control" ng-model="GradeorPercentage" id="GradeorPercentage" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="col-form-label">Passout Year</label>
                        </td>
                        <td>
                            <input class="form-control" ng-model="Passoutyear" id="Passoutyear" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="col-form-label">Select file</label>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="file" class="form-control" ng-model="clearinput" id="fileInput04"
                                    name=files[] accept="image/png, image/gif, image/jpeg,application/pdf">
                                <div class="input-group-append">
                                    <p id="fileButton04" class="input-group-text">
                                        <i class="fa fa-upload"></i>
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table table-bordered  table-sm table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th scope="col">Studies</th>
                                <th scope="col">University</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Year</th>
                                <th>Education Mode</th>
                                <th>Specialization</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="e in GetEducationList|filter:searchEducation|itemsPerPage:5 "
                                pagination-id="Educationgrid" current-page="currentPageEducation">
                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageEducation - 1) * pageSizeEducation}}
                                </td>
                                <td>{{e.Studies}}</td>
                                <td>{{e.Universityorschool}}</td>
                                <td>{{e.Grade}}</td>
                                <td>{{e.Passoutyear}}</td>
                                <td>{{e.EducationMode}}</td>
                                <td>{{e.Specialization}}</td>
                                <td>
                                    <div class="action-btn">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1Education"
                                            ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                        <img height="15" ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1EMPDocumentView"
                                            ng-click="FetchStudy(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <dir-pagination-controls pagination-id="Educationgrid" max-size="3" direction-links="true"
                        boundary-links="true" class="pagination">
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <button class="btn btn-rounded btn-success" ng-click="Update_Education();">
                <i class="fa fa-save"></i> Update </button>
            <button class="btn btn-rounded btn-danger" ng-click="ResetEducation();">
                <i class="fa fa-times"></i> Clear(Next) </button>
        </div>
    </div>
</div>



<div class="card" ng-show="btnFamily">
    <h5 class="card-header text-green">Employee Family Details</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Name</label>
                    <input class="form-control" ng-model="FamilyName" />
                </div>
                <div class="form-group">
                    <label class="col-form-label">Relationship</label>
                    <select ng-model="Familyrelationship" class="form-control">
                        <option ng-repeat="s in GetRelationshipList " value="{{s.Relationship}}">
                            {{s.Relationship}}
                        </option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Age</label>
                        <input class="form-control" ng-model="FamilyAge" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Contact No </label>
                        <input class="form-control" ng-model="FamilyContactno" onkeypress="return Validate(event);" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Occupation</label>
                    <input class="form-control" ng-model="FamilyOccupation" />
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-success" ng-click="Update_Family();">
                        <i class="fa fa-save"></i> Update </button>
                    <button class="btn btn-sm btn-danger" ng-click="ResetFamily();">
                        <i class="fa fa-times"></i> Clear(Next) </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-bordered  table-sm table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Relationship</th>
                                <th scope="col">Age</th>
                                <th scope="col">Contactno</th>
                                <th scope="col">Occupation</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                pagination-id="Familygrid" current-page="currentPageFamily">
                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageFamily - 1) * pageSizeFamily}}
                                </td>
                                <td>{{e.Name}}</td>
                                <td>{{e.Relationship}}</td>
                                <td>{{e.Age}}</td>
                                <td>{{e.Contactno}}</td>
                                <td>{{e.Occupation}}</td>
                                <td>
                                    <div class="action-btn">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1Family"
                                            ng-click="FetchFamily(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                        <img height="15" ng-click="FetchFamily(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <dir-pagination-controls pagination-id="Familygrid" max-size="3" direction-links="true"
                        boundary-links="true" class="pagination">
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card" ng-show="btnNominee">
    <h5 class="card-header text-green">Employee Nominee Detail</h5>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-lg-3">
                <label class="col-form-label">Name</label>
                <input class="form-control" ng-model="NomineeName" />
            </div>
            <div class="form-group col-lg-3">
                <label class="col-form-label">Relationship</label>
                <select ng-model="NomineeRelationship" class="form-control">
                    <option ng-repeat="s in GetRelationshipList " value="{{s.Relationship}}">
                        {{s.Relationship}}
                    </option>
                </select>
            </div>
            <div class="form-group col-lg-3">
                <label class="col-form-label">DOB</label>
                <input class="form-control" ng-model="NomineeDateOfBirth" onfocus="(this.type='date')"
                    onblur="(this.type='date')" ng-change="GetNomineeage()" />
            </div>
            <div class="form-group col-lg-3">
                <label class="col-form-label">Age</label>
                <input class="form-control" ng-model="NomineeAge" readonly />
            </div>
            <div class="form-group col-lg-3">
                <label class="col-form-label">Guardian Name</label>
                <input class="form-control" ng-model="Guardianname" />
            </div>
            <div class="form-group col-lg-3">
                <label class="col-form-label">Contact No</label>
                <input class="form-control" ng-model="RelationshipContactno" onkeypress="return Validate(event);"
                    maxlength="10" />
            </div>
            <div class="form-group col-lg-3">
                <label class="col-form-label">Amount %</label>
                <input class="form-control" ng-model="PercentageofShare" onkeypress="return Validate(event);"
                    ng-model-options='{ debounce: 1000 }'
                    ng-change="GetNominationsharepercentage(Employeeid,PercentageofShare);" />
            </div>
            <div class="form-group col-lg-3">
                <label class="col-form-label">Address</label>
                <textarea class="form-control" ng-model="NomineeAddress"></textarea>
            </div>
            <div class="form-group col-lg-12 text-right">
                <button class="btn btn-sm btn-success" ng-click="Update_NomineeFamily();">
                    <i class="fa fa-save"></i> Update </button>
                <button class="btn btn-sm btn-danger" ng-click="ResetNomineeFamily();">
                    <i class="fa fa-times"></i> Clear(Next) </button>
            </div>


            <div class="table-responsive col-lg-12">
                <table class="table table-bordered  table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Relationship</th>
                            <th scope="col">Age</th>
                            <th scope="col">Contactno</th>
                            <th scope="col">Amount %</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr dir-paginate="e in GetNomineeList |filter:searchFamily|itemsPerPage:10 "
                            pagination-id="Nomineegrid" current-page="currentPageNominee">
                            <td style="width: 50px;">
                                {{$index+1 + (currentPageNominee - 1) * pageSizeNominee}}
                            </td>
                            <td>{{e.NomineeName}}</td>
                            <td>{{e.NomineeRelationship}}</td>
                            <td>{{e.NomineeAge}}</td>
                            <td>{{e.RelationshipContactno}}</td>
                            <td>{{e.PercentageofShare}}</td>
                            <td>
                                <div class="action-btn">
                                    <img height="15" data-toggle="modal" data-target="#ModalCenter1EmpNominee"
                                        ng-click="FetchEmpNominee(e.Employeeid,e.Sno);"
                                        src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                    <img height="15" ng-click="FetchEmpNominee(e.Employeeid,e.Sno);"
                                        src="<?php echo "$domain"; ?>/assets/icons/edit.png">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <dir-pagination-controls pagination-id="Familygrid" max-size="3" direction-links="true"
                    boundary-links="true" class="pagination">
                </dir-pagination-controls>
            </div>
        </div>
    </div>
</div>


<div class="card" ng-show="btnReference">
    <h5 class="card-header text-green">Reference Details</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="emp-adrbox">
                    <h5 class="text-green">Reference 1 Detail</h5>

                    <div class="form-group col-md-12">
                        <label class="col-form-label">Reference Name</label>
                        <input class="form-control" ng-model="Reference1name" />
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-form-label">Relationship</label>
                        <select ng-model="Ref1relationship" class="form-control">
                            <option ng-repeat="s in GetRelationshipList " value="{{s.Relationship}}">
                                {{s.Relationship}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Contactno</label>
                        <input class="form-control" ng-model="Reference1contactno"
                            onkeypress="return Validate(event);" />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Address</label>
                        <input class="form-control" ng-model="Reference1address" />
                    </div>
                </div>


            </div>
            <div class="col-md-6">

                <div class="emp-adrbox">
                    <h5 class="text-green">Reference 2 Detail</h5>

                    <div class="form-group col-md-12">
                        <label class="col-form-label">Reference Name</label>
                        <input class="form-control" ng-model="Reference2name" />
                    </div>


                    <div class="form-group col-md-12">
                        <label class="col-form-label">Relationship</label>
                        <select ng-model="Ref2relationship" class="form-control">
                            <option ng-repeat="s in GetRelationshipList " value="{{s.Relationship}}">
                                {{s.Relationship}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Contactno</label>
                        <input class="form-control" ng-model="Reference2contactno"
                            onkeypress="return Validate(event);" />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Address</label>
                        <input class="form-control" ng-model="Reference2address" />
                    </div>

                </div>




            </div>
            <div class="col-md-12">
                <div class="text-right" style="margin-right: 15px;">
                    <button class="btn btn-sm btn-success" ng-click="Update_refrence();">
                        <i class="fa fa-save"></i> Update </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="btnappraisal">
    <h5 class="card-header text-green">Appraisal Details</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered  table-sm table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th scope="col">Basic</th>
                        <th scope="col">HR Allowance</th>
                        <th scope="col">TA</th>
                        <th scope="col">Performance allowance</th>
                        <th scope="col">Day allowance</th>
                        <th>PF</th>
                        <th>ESI</th>
                        <th>TDS</th>
                        <th>Professional tax</th>
                        <th>Net Salary</th>
                        <th>Gross Salary</th>
                        <th>PF Yes/no</th>
                        <th>ESI Yes/no</th>
                        <th>Other Allowance</th>
                        <th>PF Employeer</th>
                        <th>ESI Employeer</th>
                        <th>Bonus</th>
                        <th>CTC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate="e in GetAppList |filter:searchApp|itemsPerPage:10 " pagination-id="Apperesialgrid"
                        current-page="currentPageApp">
                        <td style="width: 50px;">
                            {{$index+1 + (currentPageApp - 1) * pageSizeApp}}
                        </td>
                        <td>{{e.Appresialtype}}</td>
                        <td>{{e.Basic}}</td>
                        <td>{{e.HR_Allowance}}</td>
                        <td>{{e.TA}}</td>
                        <td>{{e.Performance_allowance}}</td>
                        <td>{{e.Day_allowance}}</td>
                        <td>{{e.PF}}</td>
                        <td>{{e.ESI}}</td>
                        <td>{{e.TDS}}</td>
                        <td>{{e.Professional_tax}}</td>
                        <td>{{e.Net_Salary}}</td>
                        <td>{{e.Gross_Salary}}</td>
                        <td>{{e.PF_Yesandno}}</td>
                        <td>{{e.ESI_Yesandno}}</td>
                        <td>{{e.Other_Allowance}}</td>
                        <td>{{e.PF_Employeer_contribution}}</td>
                        <td>{{e.ESI_Employeer_contribution}}</td>
                        <td>{{e.Bonus}}</td>
                        <td>{{e.CTC}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <dir-pagination-controls pagination-id="Apperesialgrid" max-size="3" direction-links="true"
                boundary-links="true" class="pagination">
            </dir-pagination-controls>
        </div>
    </div>
</div>

<div class="card" ng-show="btnvaccination">
    <h5 class="card-header text-green">Vaccination Details</h5>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-2">
                <label class="col-form-label"> S.No </label>
                <input type="text" class="form-control" id="Vaccinatedsno" ng-model="Vaccinatedsno" readonly>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label"> Covid Vaccinated </label>
                <select class="form-control" id="Covidvaccinated" ng-model="Covidvaccinated">
                    <option Value="1st Dose">1st Dose </option>
                    <option value="2nd Dose">2nd Dose </option>
                    <option value="Booster">Booster </option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label"> Vaccinated date </label>
                <input type="text" class="form-control" id="Vaccinateddate" ng-model="Vaccinateddate"
                    onfocus="(this.type='date')" onblur="(this.type='date')">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label">Certificate</label>
                <div class="input-group">
                    <input type="file" class="form-control" ng-model="clearinput" id="fileInput05" name=files[]
                        accept="image/png, image/gif, image/jpeg,application/pdf">
                    <div class="input-group-append">
                        <p id="fileButton05" class="input-group-text">
                            <i class="fa fa-upload"></i>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <button class="btn btn-sm btn-success" ng-click="UpdateVaccination();">
                <i class="fa fa-save"></i> Update </button>
            <button class="btn btn-sm btn-success" ng-click="ResetVaccination();">
                <i class="fa fa-save"></i> Reset </button>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table   table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th scope="col"> Vaccinated </th>
                                <th scope="col"> Date </th>
                                <th scope="col">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <tr dir-paginate="e in GetVaccinationList|filter:searchVaccination|itemsPerPage:5 "
                                pagination-id="Vaccinationgrid" current-page="currentPageVaccination">
                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageVaccination - 1) * pageSizeVaccination}}
                                </td>
                                <td>{{e.Vacinationtype}}
                                </td>
                                <td>{{e.Vaccinationdate2}}
                                </td>
                                </td>
                                <td>
                                    <div class="action-btn">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1Vaccination"
                                            ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);" src="
                                                        <?php echo "$domain"; ?>/assets/icons/delete.png">
                                        <img height="15" ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);" src="
                                                            <?php echo "$domain"; ?>/assets/icons/edit.png">
                                        <img height="15" ng-click="FetchCovidvaccination(e.Employeeid,e.Sno);"
                                            data-toggle="modal" data-target="#ModalCenter1Certificate" src="
                                                                <?php echo "$domain"; ?>/assets/icons/view.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <dir-pagination-controls pagination-id="Vaccinationgrid" max-size="3" direction-links="true"
                        boundary-links="true" class="pagination">
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="btnsalary">
    <h5 class="card-header text-green">Salary Information</h5>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-3">
                <label class="col-form-label">Basic+Da</label>
                <input type="text" class="form-control" ng-model="Basic" autocomplete="off" ng-change="Getcalvalue()"
                    onkeypress="return Validate(event);">
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">HR Allowance</label>
                <input type="text" class="form-control" ng-model="HR_Allowance" autocomplete="off"
                    onkeypress="return Validate(event);" ng-change="Getcalvalue()">
            </div>

            <div class="form-group col-md-3" ng-show="Clientid==4">
                <label class="col-form-label"> Conveyence </label>
                <input type="text" class="form-control" ng-model="TA" autocomplete="off"
                    onkeypress="return Validate(event);" ng-change="Getcalvalue()">
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label"> Performance allowance </label>
                <input type="text" class="form-control" ng-model="Performance_allowance" autocomplete="off"
                    onkeypress="return Validate(event);" ng-change="Getcalvalue()">
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">Day allowance</label>
                <input type="text" class="form-control" ng-model="Day_allowance" autocomplete="off"
                    onkeypress="return Validate(event);" ng-change="Getcalvalue()" ng-disabled="btnMarketing">
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label">Day allowance include ESI</label>
                <select class="form-control" ng-model="DayallowanceincludedESI">
                    <option Value="Yes">Yes</option>
                    <option value="No">No</option>


                </select>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">PF Yes/no</label>
                <select class="form-control" ng-model="PF_Yesandno" ng-change="Getcalvalue(); GetPFFixed(PF_Yesandno);">
                    <option Value="Yes">Yes</option>
                    <option value="No">No</option>


                </select>
            </div>
            <div class="form-group col-md-3" ng-show="btnpffixed">
                <label class="col-form-label">PF Fixed/No</label>
                <select class="form-control" id="PF_Fixed" ng-model="PF_Fixed" ng-change="Getcalvalue()">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>


                </select>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">PF</label>
                <input type="text" class="form-control FIXED" ng-model="PF" autocomplete="off" readonly>
                <input type="text" class="form-control NOTFIXED" ng-model="PF" autocomplete="off"
                    ng-change="Getcalvalue()">
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">ESI Yes/no</label>
                <select class="form-control" ng-model="ESI_Yesandno" ng-model-options='{ debounce: 1000 }'
                    ng-change="Getcalvalue();CheckEsiOverLimit(ESI_Yesandno);">
                    <option Value="Yes">Yes</option>
                    <option value="No">No</option>


                </select>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label">ESI Over limit</label>
                <select class="form-control" ng-model="ESIOverlimit" ng-change="Getcalvalue()"
                    ng-disabled="btnESIOVERLIMIT">
                    <option Value="Yes">Yes</option>
                    <option value="No">No</option>


                </select>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label">ESI</label>
                <input type="text" class="form-control" ng-model="ESI" autocomplete="off" readonly>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label">TDS</label>
                <input type="text" class="form-control" ng-model="TDS" autocomplete="off">
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">Professional tax</label>
                <input type="text" class="form-control" ng-model="Professional_tax" autocomplete="off"
                    onkeypress="return Validate(event);">
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">Net Salary</label>
                <input type="text" class="form-control" ng-model="Net_Salary" autocomplete="off" readonly>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">Gross Salary</label>
                <input type="text" class="form-control" ng-model="Gross_Salary" autocomplete="off" readonly>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">Other Allowance</label>
                <input type="text" class="form-control" ng-model="Other_Allowance" autocomplete="off"
                    ng-change="Getcalvalue()" onkeypress="return Validate(event);">
            </div>




            <div class="form-group col-md-3">
                <label class="col-form-label">Type</label>
                <select class="form-control" ng-model="SalaryType">
                    <option Value="Normal">Normal</option>
                    <option value="Appraisal">Appraisal</option>
                </select>
            </div>

            <div class="form-group col-md-3" ng-show="Clientid==4">
                <label class="col-form-label">LWF</label>
                <input type="text" class="form-control" ng-model="LWF" autocomplete="off"
                    onkeypress="return Validate(event);">
            </div>
            <div class="form-group col-md-3" ng-show="PF_Yesandno=='Yes'">
                <label class="col-form-label">PF Yes/No Employeer contribution</label>
                <select class="form-control" id="Employeer_contribution_yes_no" ng-model="Employeer_contribution_yes_no"
                    ng-change="Getcalvalue()">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label">PF Employeer contribution</label>
                <input type="text" class="form-control" ng-model="PF_Employeer_contribution" autocomplete="off"
                    onkeypress="return Validate(event);" readonly>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">ESI Employeer contribution</label>
                <input type="text" class="form-control" ng-model="ESI_Employeer_contribution" autocomplete="off"
                    onkeypress="return Validate(event);" readonly>
            </div>


            <div class="form-group col-md-3">
                <label class="col-form-label">CTC</label>
                <input type="text" class="form-control" ng-model="CTC" autocomplete="off"
                    onkeypress="return Validate(event);" readonly>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label">Bonus</label>
                <input type="text" class="form-control" ng-model="Bonus" autocomplete="off"
                    onkeypress="return Validate(event);" readonly>
            </div>

            <div class="form-group col-md-12">
                <div class="text-right mt-4">
                    <button class="btn btn-sm btn-success" ng-click="Update_Salary();"><i class="fa fa-save"></i>
                        Update</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card" ng-show="btnimage">
    <h5 class="card-header text-green">Employee Image Upload</h5>
    <div class="card-body">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-lg-3">
                <img ng-src="{{Imagepath}}" ng-hide="Imagepath == null || Imagepath == '' " ng-show="Imagepath != null "
                    class="img-thumbnail mr-3" alt="Employee_image" style="width:150px;height:150px;">
            </div>
            <div class="table-responsive custom-table custom-table-noborder col-lg-4">
                <br>
                <br>

                <table class="table table-bordered table-sm">



                    <tr>

                        <td> <label class="col-form-label">Image Upload</label>
                            <div class="input-group">
                                <input type="file" class="form-control" ng-model="clearinput01" id="fileInput01"
                                    accept="image/*" name=files[] ng-model="Empimage">
                                <div class="input-group-append">
                                    <p id="fileButton01" class="input-group-text"><i class="fa fa-upload"></i>
                                    </p>
                                </div>


                            </div>




                        </td>

                    </tr>


                </table>

            </div>

        </div>
    </div>
</div>

<div class="card" ng-show="btndoc">
    <h5 class="card-header text-green">Employee Document Details</h5>
    <div class="card-body">


        <div class="row">
            <div class="col-md-4">

                <div class="form-group col-md-12">
                    <label class="col-form-label">S.No</label>
                    <input class="form-control" ng-model="DocNextno" autocomplete="off" id='DocNextno' readonly />
                </div>


                <div class="form-group col-md-12">
                    <label class="col-form-label">Document Type</label>
                    <select ng-model="Documenttype" id='Documenttype' class="form-control">

                        <option ng-repeat="s in GetDoctypeList " value="{{s.Documenttype}}">
                            {{s.Documenttype}}</option>
                    </select>
                </div>


                <div class="form-group col-md-12">
                    <label class="col-form-label">Document No</label>
                    <input class="form-control" ng-model="Documentno" autocomplete="off" id='Documentno' />
                </div>


                <div class="form-group col-md-12">
                    <label class="col-form-label">Select file</label>
                    <div class="input-group">
                        <input type="file" class="form-control" ng-model="clearinput" id="fileInput" name=files[]>
                        <div class="input-group-append">
                            <p id="fileButton" class="input-group-text">
                                <i class="fa fa-upload"></i>
                            </p>
                        </div>


                    </div>
                </div>



                <div class="form-group text-right col-md-12">
                    <button class="btn btn-sm btn-success" ng-click="Update_document();"><i class="fa fa-save"></i>
                        Update</button>
                    <button class="btn btn-sm btn-danger" ng-click="Resetdoc();"><i class="fa fa-times"></i>
                        Clear(Next)</button>
                </div>



            </div>
            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table table-bordered  table-sm table-striped">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th scope="col">Doctype</th>
                                <th scope="col">Document_No</th>
                                <!-- <th scope="col">Document_Path</th> -->



                                <th scope="col">Action</th>
                            </tr>
                        </thead>


                        <tbody>

                            <tr dir-paginate="e in GetDOCUMENTList |filter:searchFamily|itemsPerPage:10 "
                                pagination-id="Docgrid" current-page="currentPageDoc">




                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageDoc - 1) * pageSizeDoc}}
                                </td>
                                <td>{{e.Doctype}}</td>
                                <td>{{e.Documentno}}</td>
                                <!-- <td>{{e.Documentpath}}</td> -->




                                <td>
                                    <div class="action-btn">
                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1Doc"
                                            ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/delete.png">
                                        <img height="15" ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/edit.png">


                                        <img height="15" data-toggle="modal" data-target="#ModalCenter1DocumentView"
                                            ng-click="FetchDOC(e.Employeeid,e.Sno);"
                                            src="<?php echo "$domain"; ?>/assets/icons/view.png">

                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <dir-pagination-controls pagination-id="Docgrid" max-size="3" direction-links="true"
                        boundary-links="true" class="pagination">
                    </dir-pagination-controls>


                </div>

            </div>
        </div>
    </div>
</div>


<div class="card" ng-show="btnPropertyChecklist">
    <?php include 'Empasset/Assetallocation.php'?>

</div>

<div class="card" ng-show="btnidcard">
    <h5 class="card-header text-green">Employee Image Upload</h5>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin: 30px;background-color: #3ac47d;">
                <h5 class="card-header" style="background-color: #3ac47d;color:#ffffff">ID Card</h5>
                <div class="card-body">
                    <div id="pdfExport">
                        <div class="pdf-sipl">
                            <style>
                            .btn-nda-down {
                                position: absolute;
                                top: 5px;
                                right: 15px;
                            }
                            </style>

                            <!-- old -->
                            <div class='nda-ta-content' ng-show="Clientid!=4">
                                <div class="idbox">
                                    <div class="row">
                                        <div class="col-lg-7" id="pdfExportidcard">

                                            <table class="britannia-idcard">

                                                <tr>
                                                    <td>
                                                        <div id='Empfront'>
                                                            <img class="britannia-id-bg" src="img/front1.jpg">

                                                            <div class="britannia-id-front-info">

                                                                <div id="result_image">
                                                                    <center>
                                                                        <img id="result_image" src="{{Imagepath}}">
                                                                    </center>
                                                                </div>
                                                                <p>{{Firstname}}
                                                                    {{Lastname}}
                                                                </p>
                                                                <p class="fontid">
                                                                    {{EmpDepartment}}
                                                                </p>
                                                                <p class="fontid">
                                                                    {{EmpDesignation}}
                                                                </p>
                                                                <p class="fontid">
                                                                    ID
                                                                    No :
                                                                    {{Employeeid}}
                                                                </p>
                                                                <p class="fontid">
                                                                    DOJ :
                                                                    {{Date_Of_Joing}}
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="padding-left:10px;">
                                                        <div id='Empback'>
                                                            <img class="britannia-id-bg" src="img/back1.jpg">

                                                            <div class="britannia-id-back-info">


                                                                <p>Blood
                                                                    Group&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                                    {{Bloodgroup}}
                                                                </p>
                                                                <p>Date of Birth
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                                    {{Dob}}</p>
                                                                <p>Emergency<br />Contact
                                                                    Number :
                                                                    {{EmergencyContactno}}
                                                                </p>

                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <!-- <input class="form-control" type="file" id="avatar"> -->
                                                        <div class="custom-file">
                                                            <input type="file" id="avatar" class="custom-file-input"
                                                                required>
                                                            <label class="custom-file-label">Choose
                                                                file...</label>
                                                        </div>
                                                        <br />
                                                        <br />
                                                        <div id="croppie">
                                                            <img src="" alt="">
                                                        </div>
                                                        <div style="margin-left:50px">
                                                            <button class="btn btn-info" id="upload">
                                                                <i class="fa fa-upload"></i>
                                                                Update </button>
                                                            <button class="btn btn-id-down" id="download">
                                                                <i class="fa fa-download"></i>
                                                                Download
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delhi starts -->

                            <div class='nda-ta-content mt-2' ng-show="Clientid==4">
                                <div class="idbox">
                                    <div class="row">
                                        <div class="col-lg-7" id="pdfExportidcard">

                                            <table class="britannia-idcard">

                                                <tr>
                                                    <td>
                                                        <div id='Empfront4'>
                                                            <img class="britannia-id-bg" src="img/front4.jpg">

                                                            <div class="britannia-client4-front-info">

                                                                <div id="result_image4">
                                                                    <center>
                                                                        <!-- <img id="result_image4" src="img/user.jpg"> -->
                                                                        <img id="result_image4" src="{{Imagepath}}">
                                                                    </center>
                                                                </div>

                                                                <div class="client4-emp-info text-bold">
                                                                    <p>{{Employeeid}}</p>
                                                                    <p class="">{{Firstname}} {{Lastname}}</p>
                                                                    <p>{{EmpDepartment}}</p>
                                                                    <p>North India</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="padding-left:10px;">
                                                        <div id='Empback4'>
                                                            <img class="britannia-id-bg" src="img/back4.jpg">

                                                            <div class="britannia-id-client4-back-info">

                                                                <table>
                                                                    <tr>
                                                                        <td>Date of Birth</td>
                                                                        <td>: {{Dob | date:'dd-MM-yyyy'}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Date of Joining</td>
                                                                        <td>: {{Date_Of_Joing | date:'dd-MM-yyyy'}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>In case of Emergency</td>
                                                                        <td>: {{EmergencyContactno}}</td>
                                                                    </tr>
                                                                </table>



                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                            </table>
                                        </div>

                                        <div class="col-md-4">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <!-- <input class="form-control" type="file" id="avatar4"> -->
                                                        <div class="custom-file">
                                                            <input type="file" id="avatar4" class="custom-file-input"
                                                                required>
                                                            <label class="custom-file-label">Choose
                                                                file...</label>
                                                        </div>
                                                        <br />
                                                        <br />
                                                        <div id="croppie4">
                                                            <img src="" alt="">
                                                        </div>
                                                        <div style="margin-left:50px">
                                                            <button class="btn btn-info" id="upload4">
                                                                <i class="fa fa-upload"></i>
                                                                Update </button>
                                                            <button class="btn btn-id-down" id="download4">
                                                                <i class="fa fa-download4"></i>
                                                                Download
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delhi ends -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card" ng-show="btnpromotion">
    <h5 class="card-header text-green">Department / Designation Details</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-form-label">S.no </label>
                    <input class="form-control" ng-model="PromotionNextno" autocomplete="off" readonly />
                </div>
                <div class="form-group">
                    <label class="col-form-label">Department</label>
                    <select ng-model="Department" class="form-control">
                        <option ng-repeat="s in GetDepartmentList " value="{{s.Department}}">
                            {{s.Department}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Designation</label>
                    <select ng-model="Designation" class="form-control">
                        <option ng-repeat="s in GetDesignationList " value="{{s.Designation}}">
                            {{s.Designation}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">From</label>
                    <input type="text" class="form-control" ng-model="Fromperiod" onfocus="(this.type='date')"
                        onblur="(this.type='date')" ng-change="GetDeptDays();">
                </div>
                <div class="form-group">
                    <label class="col-form-label">To</label>
                    <input type="text" class="form-control" ng-model="Toperiod" onfocus="(this.type='date')"
                        onblur="(this.type='date')" ng-change="GetDeptDays();">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Period</label>
                    <input class="form-control" ng-model="Period" autocomplete="off" readonly />
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-success" ng-click="Update_DEPT();">
                        <i class="fa fa-save"></i> Update </button>
                    <button class="btn btn-sm btn-danger" ng-click="ResetPromotion();">
                        <i class="fa fa-times"></i> Clear(Next) </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-bordered  table-sm table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th scope="col">Department</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Period</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="e in GetPromoList |filter:searchFamily|itemsPerPage:10 "
                                pagination-id="Deptgrid" current-page="currentPageDept">
                                <td style="width: 50px;">
                                    {{$index+1 + (currentPageDept - 1) * pageSizeDept}}
                                </td>
                                <td>{{e.Department}}</td>
                                <td>{{e.Designation}}</td>
                                <td>{{e.Period}}</td>
                                <td>
                                    <div class="action-btn">
                                        <img height="15" ng-click="FetchPromotion(e.Employeeid,e.Sno);" src="
                                                    <?php echo "$domain"; ?>/assets/icons/edit.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <dir-pagination-controls pagination-id="Deptgrid" max-size="3" direction-links="true"
                        boundary-links="true" class="pagination">
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" id="btnsipltamil" ng-show="btnsipltamil">
    <h5 class="card-header text-green">Application Detail In Tamil/Hindi
    </h5>




    <div class="card-body">

        <div class="row">
            <div class="col-lg-6">
                <label class="col-form-label">Forms(Tamil)
                </label>
                <div class="input-group">
                    <input type="file" class="form-control" ng-model="clearinput" id="fileInputEmpReporttamil"
                        name=files[] accept="application/pdf">
                    <div class="input-group-append">
                        <p id="fileButtonEmpReporttamil" class="input-group-text pointer" title="Document Upload">
                            <i class="fa fa-upload"></i>&nbsp;&nbsp;
                        </p>
                        <p id="btnEmpReportview" class="input-group-text btn-info pointer" title="Document View"
                            data-toggle="modal" data-target="#ModalCenterTamilEmpReportView">
                            <i class="fa fa-eye"></i>
                        </p>
                        <p id="btnEmpReport" class="input-group-text btn-warning pointer" title="Document Download">
                            <i class="fa fa-download"></i>&nbsp;
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-form-label">Forms(Hindi)
                </label>
                <div class="input-group">
                    <input type="file" class="form-control" ng-model="clearinput" id="fileInputEmpReporthindi"
                        name=files[] accept="application/pdf">
                    <div class="input-group-append">
                        <p id="fileButtonEmpReporthindi" class="input-group-text pointer" title="Document Upload">
                            <i class="fa fa-upload"></i>&nbsp;&nbsp;
                        </p>
                        <p id="btnEmpReportviewhindi" class="input-group-text btn-info pointer" title="Document View"
                            data-toggle="modal" data-target="#ModalCenterHindiEmpReportView">
                            <i class="fa fa-eye"></i>
                        </p>

                        <p id="btnEmpReportHindi" class="input-group-text btn-warning pointer"
                            title="Document Download">
                            <i class="fa fa-download"></i>&nbsp;
                        </p>


                    </div>
                </div>
            </div>
        </div>
        <br />
        <table class="w-100">

            <tr>
                <td class="w-20"><label class="col-form-label">Employee Details
                    </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmployeeDetailTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmployeeDetailHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td class="w-20"><label class="col-form-label">Form-34 </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1FORM34Tamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1FORM34Hindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td class="w-20"><label class="col-form-label">Attention Of The
                        Employee </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EMPAttentionTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EMPAttentionHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td class="w-20"> <label class="col-form-label">Employee
                        Declaration Form </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpDeclarationTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpDeclarationHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">Employee Stating </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpStatingTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpStatingHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td> <label class="col-form-label">NDA </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal" data-target="#ModalCenterNDA">
                                English</button>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label class="col-form-label">Employee Agreement </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpAgreementTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpAgreementHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td> <label class="col-form-label">Employee Training </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpTrainingTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpTrainingHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">Interview Details
                    </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1Employeeinterviewtamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1Employeeinterviewhindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">Service Improvement Record
                    </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpServiceTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpServiceHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">Form-2 Revised </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpForm2RevisedTamil">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1EmpForm2RevisedHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">GRATUITY </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenterGRATUITY">
                                English</button>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>

                <td><label class="col-form-label">Performance Assessment
                    </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="getperformanceassement()" data-toggle="modal"
                                data-target="#ModalCenter1EmpFormAssessment">
                                Assessment</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">Confirmation Letter
                    </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1ConfirmationView">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1ConfirmationViewHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">Appointment Letter
                    </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1AppointmentView">
                                Tamil</button>
                            <button class="btn app-btn2" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1AppointmentHindi">
                                Hindi</button>
                        </div>
                    </div>
                </td>
                <td><label class="col-form-label">Employee Contract
                    </label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn app-btn1" ng-click="" data-toggle="modal"
                                data-target="#ModalCenter1Employeecontract">
                                Contract</button>
                        </div>
                    </div>
                </td>
            </tr>

        </table>


    </div>
</div>