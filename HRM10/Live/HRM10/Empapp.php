  <div class="modal fade emp-modal" id="ModalCenter1EmpNominee" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{NomineeSno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Are You sure want to delete this record?
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteNominee();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1Education" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{EduNextno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Are You sure want to delete this record?
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteEducation();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1Family" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{FamilyNextno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Are You sure want to delete this record?
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteFamily();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1Doc" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{DocNextno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Are You sure want to delete this record?
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteDoc();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1DocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee- Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{DocumentView}}"
                                        ng-hide="DocumentView == null || DocumentView == '' "
                                        ng-show="DocumentView != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1Property" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{CheckitemSno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Are You sure want to delete this record?
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteProperty();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1PropertyView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Property Check Lists
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Propertychecklistitemimage}}"
                                        ng-hide="Propertychecklistitemimage == null || Propertychecklistitemimage == '' "
                                        ng-show="Propertychecklistitemimage != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal fade emp-modal" id="ModalCenter1PropertyView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Property Check Lists
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    
                                    <iframe ng-src="{{Propertychecklistitemimage}}"
                                        ng-hide="Propertychecklistitemimage == null || Propertychecklistitemimage == '' "
                                        ng-show="Propertychecklistitemimage != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="modal fade emp-modal" id="ModalCenter1EMPDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee- Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmpDocumentView}}"
                                        ng-hide="EmpDocumentView == null || EmpDocumentView == '' "
                                        ng-show="EmpDocumentView != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade emp-modal" id="ModalCenter1EMPBackgroundView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee- Document
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{BackgroundVerificationpath}}"
                                        ng-hide="BackgroundVerificationpath == null || BackgroundVerificationpath == '' "
                                        ng-show="BackgroundVerificationpath != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1Vaccination" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Delete {{Vaccinatedsno}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Are You sure want to delete this record?
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-danger" ng-click="DeleteVaccination();"
                                    data-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1Certificate" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Vaccination-Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{VaccinationView}}"
                                        ng-hide="VaccinationView == null || VaccinationView == '' "
                                        ng-show="VaccinationView != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade emp-modal" id="ModalCenter1EmployeeDetailTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர் பற்றிய விபரம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label">Employee
                                                    Details </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDetailtamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDetailtamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmployeeDetailDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnempdetailtamil" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportempdetailtamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <center>
                                                            <h4>தொழிலாளர் பற்றிய
                                                                விபரம்</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        .candidate-photo {
                                                            display: inline-block;
                                                            height: 140px;
                                                            width: 140px;
                                                            padding: 5px;
                                                            text-align: center;
                                                            position: absolute;
                                                            right: 4.8%;

                                                            border: 1px solid #888888;
                                                        }

                                                        @media print {
                                                            @page {
                                                                margin: 10;
                                                            }

                                                            #btnempdetailtamil {
                                                                display: none;
                                                                ;
                                                            }

                                                        }
                                                        </style>


                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " alt="Employee_image"
                                                            class="candidate-photo">

                                                        <table cellpadding="5">
                                                            <tr>
                                                                <td>பெயர்</td>
                                                                <td>:
                                                                    {{Title}}{{Firstname}} {{Lastname}}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>தொழிலாளர் எண்
                                                                </td>
                                                                <td>: {{Employeeid}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பதவி</td>
                                                                <td>:
                                                                    {{EmpDesignation}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பிரிவு / துறை
                                                                </td>
                                                                <td>:
                                                                    {{EmpDepartment}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>கல்வி தகுதி</td>
                                                                <td>:
                                                                    {{Highestqualification}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பிறந்த தேதி /
                                                                    வயது</td>
                                                                <td>:
                                                                    {{Dob2}}/{{Age}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>திருமண நிலை</td>
                                                                <td>: {{Married}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>பாலினம்</td>
                                                                <td>: {{Gender}}
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        தற்போதைய
                                                                        முகவரி<br />
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        நிரந்தர
                                                                        முகவரி<br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{CurrentAddress}}
                                                                        <br>
                                                                        {{CurrentCountry}}
                                                                        <br>
                                                                        {{CurrentState}}
                                                                        <br>
                                                                        {{CurrentCity}}
                                                                        <br>
                                                                        {{CurrentPincode}}
                                                                    </td>
                                                                    <td>{{PermanentAddress}}
                                                                        <br>
                                                                        {{PermanentCountry}}
                                                                        <br>
                                                                        {{PermanentState}}
                                                                        <br>
                                                                        {{PermanentCity}}
                                                                        <br>
                                                                        {{PermanentPincode}}
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p>அவசரகால தொடர்புக்கு
                                                            (குடும்ப உறுப்பினர்கள்)
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        பெயர்<br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        தொலைபேசி
                                                                        எண்<br />
                                                                    </td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        உறவுமுறை<br />
                                                                    </td>
                                                                </tr>

                                                                <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Familygrid"
                                                                    current-page="currentPageFamily">




                                                                    <td>{{e.Name}}
                                                                    </td>


                                                                    <td>{{e.Contactno}}
                                                                    </td>


                                                                    <td>{{e.Relationship}}
                                                                    </td>


                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table class="doc-table">

                                                            <tr>
                                                                <td style="width:250px; text-align: center;">
                                                                    நியமனதாரர்
                                                                    பெயர்<br /><br />
                                                                </td>

                                                                <td style="width:250px; text-align: center;">
                                                                    உறவுமுறை<br /><br />
                                                                </td>
                                                            </tr>


                                                            <tr dir-paginate="e in GetNomineeList |filter:searchFamily|itemsPerPage:10 "
                                                                pagination-id="Nomineegrid">

                                                                <td>{{e.NomineeName}}

                                                                </td>
                                                                <td>{{e.NomineeRelationship}}</td>

                                                            </tr>


                                                        </table>



                                                        <p>சமூக நன்மைகள்/NA</p>
                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        ESI<br /><br />0.75%
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PF<br /><br />12%
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:766.4px;">
                                                                        சம்பளம்: RS.
                                                                        {{Gross_Salary - Performance_allowance | currency:''}}
                                                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                        நாள் / மாதம்
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;">
                                                            தொழிலாளர் கையொப்பம்<span style="float:right;">நிர்வாகி
                                                                கையொப்பம்</span></p>
                                                        <p>நாள் :{{Date_Of_Joing2}}</p>



                                                    </div>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenterEmployeeDetailDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee-Detail-View
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmployeeDetailpathtamil}}"
                                        ng-hide="EmployeeDetailpathtamil == null || EmployeeDetailpathtamil == '' "
                                        ng-show="EmployeeDetailpathtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade emp-modal" id="ModalCenter1EmployeeDetailHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Details / कर्मचारी का विवरण
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label">Employee
                                                    Details </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDetailhindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDetailhindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmployeeDetailHindiDocumnetView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnempdetailHindi" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportempdetailhindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <div class="text-center">
                                                            <h4>Employee Details / कर्मचारी का विवरण</h4>
                                                        </div>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        .candidate-photo {
                                                            display: inline-block;
                                                            height: 140px;
                                                            width: 140px;
                                                            padding: 5px;
                                                            text-align: center;
                                                            position: absolute;
                                                            right: 4.8%;

                                                            border: 1px solid #888888;
                                                        }

                                                        @media print {
                                                            @page {
                                                                margin: 10;
                                                            }

                                                            #btnempdetailHindi {
                                                                display: none;
                                                                ;
                                                            }

                                                        }
                                                        </style>


                                                        <img ng-src="{{Imagepath}}"
                                                            ng-hide="Imagepath == null || Imagepath == '' "
                                                            ng-show="Imagepath != null " alt="Employee_image"
                                                            class="candidate-photo">


                                                        <table cellpadding="3">
                                                            <tr>
                                                                <td>NAME / नाम</td>
                                                                <td>: {{Title}}{{Firstname}} {{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>EMPLOYEE NO / कर्मचारी संख्या</td>
                                                                <td>: {{Employeeid}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DESIGNATION / पदनाम</td>
                                                                <td>: {{EmpDesignation}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DEPARTMENT / विभाग</td>
                                                                <td>: {{EmpDepartment}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>EDUCATIONAL QUALIFICATION / शैक्षिक योग्यता
                                                                </td>
                                                                <td>: {{Highestqualification}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>DATE OF BIRTH / AGE / की तारीख</td>
                                                                <td>: {{Dob2}}/{{Age}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>MARITAL STATUS / वैवाहिक स्थिति </td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>GENDER / लिंग
                                                                </td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                        </table>



                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PRESENT ADDRESS/वर्तमान पता<br />
                                                                    </td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PERMANENT ADDRESS / स्थाई पता<br />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{CurrentAddress}}
                                                                        <br>
                                                                        {{CurrentCountry}}
                                                                        <br>
                                                                        {{CurrentState}}
                                                                        <br>
                                                                        {{CurrentCity}}
                                                                        <br>
                                                                        {{CurrentPincode}}
                                                                    </td>
                                                                    <td>{{PermanentAddress}}
                                                                        <br>
                                                                        {{PermanentCountry}}
                                                                        <br>
                                                                        {{PermanentState}}
                                                                        <br>
                                                                        {{PermanentCity}}
                                                                        <br>
                                                                        {{PermanentPincode}}
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p>INCASE OF EMERGENCY CONTACT / आपातकालीन संपर्क की वृद्धि
                                                        </p>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:250px; text-align: center;">
                                                                        NAME/ नाम<br /><br /><br /><br /></td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        TELEPHONE NO / टेलीफ़ोन
                                                                        नंबर<br /><br /><br /><br /></td>
                                                                    <td style="width:250px; text-align: center;">
                                                                        RELATIONSHIP/संबंध<br /><br /><br /><br />
                                                                    </td>
                                                                </tr>

                                                                <tr dir-paginate="e in GetFamilyList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Familygrid"
                                                                    current-page="currentPageFamily">




                                                                    <td>{{e.Name}}
                                                                    </td>
                                                                    <td>{{e.Contactno}}
                                                                    </td>

                                                                    <td>{{e.Relationship}}
                                                                    </td>






                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table style="margin-left:-5px" class="doc-table">
                                                            <tr>
                                                                <td style="width:260px; text-align: center;">NOMINEE
                                                                    NAME/नामांकित व्यक्ति का नाम<br /><br /></td>

                                                                <td style="width:250px; text-align: center;">
                                                                    RELATIONSHIP / संबंध<br /><br /></td>
                                                            </tr>
                                                            <tbody>
                                                                <tr dir-paginate="e in GetNomineeList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Nomineegrid">

                                                                    <td>{{e.NomineeName}}

                                                                    </td>
                                                                    <td>{{e.NomineeRelationship}}</td>

                                                                </tr>

                                                            </tbody>
                                                        </table>



                                                        <p>SOCIAL BENEFITS / सामाजिक लाभ</p>
                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        ESI<br /><br />0.75%</td>
                                                                    <td style="width:383.2px; text-align: center;">
                                                                        PF<br /><br />12%</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:766.4px;">WAGES / वेतन: RS.
                                                                        {{Gross_Salary - Performance_allowance | currency:''}}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PER
                                                                        MONTH / प्रति महीने</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;">EMPLOYEE SIGNATURE / कर्मचारी
                                                            हस्ताक्षर<span style="float:right;">AUTHORISED SIGNATURE
                                                                / अधिकृत हस्ताक्षर </span></p>
                                                        <br />
                                                        <p>DATE / दिनांक :{{Date_Of_Joing2}}</p>











                                                    </div>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmployeeDetailHindiDocumnetView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee-Detail-View
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{EmployeeDetailpathhindi}}"
                                        ng-hide="EmployeeDetailpathhindi == null || EmployeeDetailpathhindi == '' "
                                        ng-show="EmployeeDetailpathhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade emp-modal" id="ModalCenter1FORM34Tamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM NO.34 - Nomination
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> FORM-34
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputform34tamil" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonform34tamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterForm34TamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnform34tamil" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporform34ltamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h3>FORM NO.34 - Nomination<br />(விதி 93 C இன் கீழ்
                                                                பரிந்துரைக்கப்பட்டது)</h3>
                                                        </center>

                                                        <p>I hereby declare that in the event of my death before
                                                            resuming work, the dues of my salary and other
                                                            settlement from the company may please be paid to
                                                            {{NomineeName2}} who is my {{NomineeRelationship2}} and
                                                            residing at the below address.</p>
                                                        <p>எனது இறப்பிற்கு பின்னால் கம்பெனியில் இருந்து எனக்கு சேர
                                                            வேண்டிய சம்பளம் மற்றும் இதர படிகள் அனைத்தும்
                                                            {{NomineeName2}} எனது
                                                            {{NomineeRelationship2}} அவர்களுக்கு வழங்குமாறு
                                                            கேட்டுக்கொள்கிறேன். மேலும் தற்போது அவர்கள் கீழ்க்கண்ட
                                                            விலாசத்தில் வசித்து வருகிறார்கள்.</p>

                                                        <p>Address / முகவரி </p>
                                                        <br />
                                                        {{PermanentAddress}}
                                                        <br>
                                                        {{PermanentCountry}}
                                                        <br>
                                                        {{PermanentState}}
                                                        <br>
                                                        {{PermanentCity}}
                                                        <br>
                                                        {{PermanentPincode}}<br /><br /><br />








                                                        <p>Thanking you </p>
                                                        <p>நன்றி</p>

                                                        <br /><br />
                                                        <p>Yours faithfully </p>
                                                        <p>தங்கள் உண்மையுள்ள</p>

                                                        <br /><br />
                                                        <p>Employee Signature</p>
                                                        <p>தொழிலாளர் கையொப்பம்</p>
                                                        <p>Witness : </p>
                                                        <p>சாட்சி</p>
                                                        <br /><br />
                                                        <p>1</p>
                                                        <br /><br />
                                                        <p>2</p>



                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterForm34TamilDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-34
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form34pathtamil}}"
                                        ng-hide="Form34pathtamil == null || Form34pathtamil == '' "
                                        ng-show="Form34pathtamil != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenter1FORM34Hindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM NO.34 - Nomination
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> FORM-34
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputform34hindi" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonform34hindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterForm34HindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnform34hindi" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporform34hindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <center>
                                                            <h4>FORM NO.34 - Nomination<br />(नियम 93 सी . के तहत
                                                                निर्धारित)</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <p>I hereby declare that in the event of my death before
                                                            resuming work, the dues of my salary and other
                                                            settlement from the company may please be paid to
                                                            {{NomineeName2}} who is my {{NomineeRelationship2}} and
                                                            residing at the below address.</p>


                                                        <p>मैं अनुरोध करता हूं कि मेरी मृत्यु के बाद कंपनी की ओर से
                                                            मुझे देय सभी वेतन और अन्य कदमों का {{NomineeName2}} भुगतान
                                                            मेरे {{NomineeRelationship2}} को करें। और वर्तमान में वे
                                                            निम्न पते पर निवास कर रहे हैं।.</p>

                                                        <p>Address / पता </p>
                                                        <br />{{PermanentAddress}}
                                                        <br>
                                                        {{PermanentCountry}}
                                                        <br>
                                                        {{PermanentState}}
                                                        <br>
                                                        {{PermanentCity}}
                                                        <br>
                                                        {{PermanentPincode}}


                                                        <p>Thanking you </p>
                                                        <p>धन्यवाद </p>




                                                        </br>
                                                        <p> Employee Signature </p>
                                                        <p>श्रमिकों के हस्ताक्षर </p>
                                                        <br>
                                                        <p>Witness : </p>
                                                        <p>गवाह </p>
                                                        <br /><br />
                                                        <p>1</p>
                                                        <br /><br />
                                                        <p>2</p>









                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterForm34HindiDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-34
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form34pathtamilhindi}}"
                                        ng-hide="Form34pathtamilhindi == null || Form34pathtamilhindi == '' "
                                        ng-show="Form34pathtamilhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade emp-modal" id="ModalCenter1EMPAttentionTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணியாளர்களின் கவனத்திற்கு
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Attention
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAttentiontamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAttentiontamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEMPAttentionTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAttentiontamil"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAttentiontamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணியாளர்களின் கவனத்திற்கு</h4>
                                                        </center>


                                                        <p>என்னுடைய வேலைத்திறனை நிர்வாகஸ்தர்கள் ஒப்புக் கொண்டால்
                                                            மட்டுமே நிரந்தரமாக்க வேண்டியதில்லை எனவும் உறுதி
                                                            கூறுகின்றேன் (சட்டப்படி நிரந்தரமாக்கக்கூடிய கால
                                                            அளவிற்குள்)</p>

                                                        <p>தாங்கள் எனக்கு அளிக்கப்பட்ட வேலைக்கு நிர்வாகத்தின்
                                                            முழுதிருப்திக்கேற்ப பணிபுரிவேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>மேலே நிர்வாகத்தால் கூறப்பட்ட அனைத்து விதிமுறைகளுக்கும்
                                                            கட்டுப்பட்டு நடப்பேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>என்னால் நிர்வாகத்திற்கு கொடுக்கப்பட்ட விபரங்கள் யாவும்
                                                            உண்மையென கூறுகிறேன்.</p>

                                                        <p>நிர்வாகத்தின் விதிகளுக்கும், சட்டதிட்டங்களுக்கும்
                                                            கட்டுப்பட்டு நடப்பேன் என உறுதி கூறுகிறேன்.</p>

                                                        <p>நிர்வாகத்திற்கு கேடு விளைவிக்கும் பொருட்டு எவ்வித செயலும்
                                                            செய்யமாட்டேன் என உறுதி அளிக்கிறேன்.</p>

                                                        <p>நான் நிர்வாகத்தின் எந்தவிதமான வற்புறுத்தலுக்கோ,
                                                            அச்சறுத்தலுக்கோ, அபராதத்திற்கோ கட்டாயத்திற்கோ
                                                            உட்படுத்தப்படாமல் எனது விருப்பத்தில் வேலை செய்ய
                                                            ஒப்புக்கொள்கிறேன்.</p>

                                                        <p>மேலே கூறிய விவரங்கள் அனைத்தும் இருவராலும் மனப்பூர்வமாக
                                                            ஒப்புக்கொள்ளப்பட்டவை.</p>





                                                        <p style="text-align:left;">
                                                            தொழிலாளர்
                                                            <span style="float:right;">பணியாளர்</span>
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEMPAttentionTamilDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Attention
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Attentionoftheemployeepathtamil}}"
                                        ng-hide="Attentionoftheemployeepathtamil == null || Attentionoftheemployeepathtamil == '' "
                                        ng-show="Attentionoftheemployeepathtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade emp-modal" id="ModalCenter1EMPAttentionHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Attention of the employee
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Attention
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAttentionhindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAttentionhindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEMPAttentionHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAttentionhindi"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAttentionhindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Attention of the employee/ कर्मचारी के ध्यान के लिए
                                                            </h4>
                                                        </center>


                                                        <p>मैं यह भी पुष्टि करता हूं कि मेरा रोजगार तब तक स्थायी
                                                            नहीं होगा जब तक कि प्रबंधन सहमत न हो (समय की अवधि के
                                                            भीतर जिसे कानून द्वारा स्थायी बनाया जा सकता है) ।.</p>

                                                        <p>मैं वचन देता हूँ कि मुझे जो कार्य सौंपा गया है, उसे मैं
                                                            प्रबंधन की पूर्ण संतुष्टि के अनुरूप करूँगा।.</p>

                                                        <p>मैं उपरोक्त प्रबंधन द्वारा उल्लिखित सभी नियमों का पालन
                                                            करने का वादा करता हूं।.</p>

                                                        <p>मैं घोषणा करता हूं कि मेरे द्वारा प्रबंधन को दिए गए सभी
                                                            विवरण सत्य हैं।.</p>

                                                        <p>मैं प्रशासन के नियमों और विनियमों का पालन करने का वादा
                                                            करता हूं।.</p>

                                                        <p>मैं वादा करता हूं कि मैं प्रशासन को नुकसान पहुंचाने के
                                                            लिए कुछ नहीं करूंगा।.</p>

                                                        <p>मैं प्रबंधन द्वारा किसी भी दबाव, धमकी, दंड या जबरदस्ती के
                                                            बिना अपनी मर्जी से काम करने के लिए सहमत हूं।.</p>

                                                        <p>उपरोक्त सभी विवरण दोनों के बीच वैवाहिक रूप से सहमत हैं।.
                                                        </p>







                                                        <p style="text-align:left;">
                                                            प्रशासक
                                                            <span style="float:right;">कर्मचारी</span>
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEMPAttentionHindiDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Attention
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Attentionoftheemployeepathhindi}}"
                                        ng-hide="Attentionoftheemployeepathhindi == null || Attentionoftheemployeepathhindi == '' "
                                        ng-show="Attentionoftheemployeepathhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade emp-modal" id="ModalCenter1EmpDeclarationTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர் சுய அறிவிப்பு படிவம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Declaration
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDeclarationtamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDeclarationtamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpDeclarationtamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpDeclarationTamil"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpDeclarationtamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE DECLARATION FORM<br />தொழிலாளர் சுய
                                                                அறிவிப்பு படிவம்</h4>
                                                        </center>


                                                        <p>BIPL will provide the food, stay and transport facilities
                                                            for employees in nominal charge.<br />BIPL
                                                            தொழிலாளர்களுக்கு குறைந்த விலையில் உணவு , தங்கும் இடம்
                                                            மற்றும் போக்குவரத்து வசதிகளை அளிக்கிறது</p>


                                                        <p>Please find the monthly charges for your reference and if
                                                            interested select the requirement.<br />கீழே
                                                            குறிப்பிட்டுள்ள மாத கட்டணங்களை படித்து நீங்கள்
                                                            விரும்பினால் உங்கள் தேவைகளை தேர்ந்தெடுங்கள்</p>
                                                        <p>Please confirm your acceptance of this declaration form
                                                            by signing.<br />தங்களது ஒப்புதலை இந்த தொழிலாளர்
                                                            அறிவிப்பு படிவத்தில் கையெழுத்து இட்டு உறுதி செய்யவும் .
                                                        </p>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>FACILITIES</td>
                                                                    <td>CHARGE DETAILS</td>
                                                                    <td>YES</td>
                                                                    <td>NO</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>தங்கும் இடம்/Hostel</td>
                                                                    <td>RS. 428/மாதம்</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="3">உணவு/Food </td>
                                                                    <td>
                                                                        காலை உணவு – RS.16 / நாள்/Morning
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        மதிய உணவு – RS.22 / நாள்/Lunch
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        இரவு உணவு – RS.16 / நாள்/Dinner
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        போக்குவரத்து/Transport
                                                                    </td>
                                                                    <td>
                                                                        RS.156 - மாதம்
                                                                    </td>

                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>குறிப்பு :</p>
                                                        <ol>
                                                            <li>Bus Route: Nallur - Muthanampalayam - Kovilvazhi -
                                                                K. Chettipalayam - BIPL.<br />
                                                                பேருந்து வழித்தடம்: நல்லூர் - முத்தனம்பாளையம் -
                                                                கோவில்வழி - கே. செட்டிபாளையம் - BIPL.</li>
                                                            <li>Food & Transport charges would be on pro - rata
                                                                basis ( consumed / utilized days ) <br />
                                                                உணவு மற்றும் போக்குவரத்துக் கட்டணங்கள் தொழிலாளர்கள்
                                                                உபயோகிக்கும் நாட்களை கொண்டு கணக்கிடப்படும்.</li>
                                                        </ol>
                                                        <p>I acknowledge the charges for list of facilities utilized
                                                            and hereby confirm my acceptance with my own free will
                                                            and shall abide by the same.<br />நான் மேலே
                                                            குறிப்பிட்டுள்ள வசதிகளையும் அதற்கான கட்டணத்தையும் எனது
                                                            சொந்த விருப்பத்துடன் ஒப்புக்கொள்கிறேன் என்பதை உறுதி
                                                            செய்கிறேன்.</p>

                                                        <p>EMPLOYEE SIGNATURE<br />
                                                            கையெழுத்து</p>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpDeclarationtamilDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Declaration Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeedeclarationpathtamil}}"
                                        ng-hide="Employeedeclarationpathtamil == null || Employeedeclarationpathtamil == '' "
                                        ng-show="Employeedeclarationpathtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenter1EmpDeclarationHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE DECLARATION FORM
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Declaration
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpDeclarationHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpDeclarationHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpDeclarationHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpDeclarationHindi"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpDeclarationHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE DECLARATION FORM<br />कर्मचारी घोषणा फॉर्म
                                                            </h4>
                                                        </center>

                                                        <p>BIPL will provide the food, stay and transport facilities
                                                            for employees in nominal charge.</p>
                                                        <p>एसआईपीएल नाममात्र के शुल्क पर कर्मचारियों के लिए भोजन,
                                                            ठहरने और परिवहन की सुविधा प्रदान करेगा।.</p>
                                                        <p>Please find the monthly charges for your reference and if
                                                            interested select the requirement.</p>
                                                        <p>कृपया अपने संदर्भ के लिए मासिक शुल्क खोजें और यदि इच्छुक
                                                            हैं तो आवश्यकता का चयन करें.</p>
                                                        <p>Please confirm your acceptance of this declaration form
                                                            by signing.</p>
                                                        <p>कृपया हस्ताक्षर करके इस घोषणा पत्र की स्वीकृति की पुष्टि
                                                            करें।.</p>




                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>FACILITIES सुविधाएँ</td>
                                                                    <td>CHARGE DETAILS शुल्क विवरण</td>
                                                                    <td>YES हां</td>
                                                                    <td>NO ना</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>DORMITORY MAINTENANCE
                                                                        छात्रावास
                                                                    </td>
                                                                    <td>RS. 428/ महीना</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="3">FOOD भोजन</td>
                                                                    <td>

                                                                        सुबह का नाश्ता – RS.16 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        दोपहर का भोजन – RS.22 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        रात का खाना – RS.16 / दिन
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        TRANSPORT
                                                                        यातायात
                                                                    </td>
                                                                    <td>

                                                                        RS.156 – महीना
                                                                    </td>

                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>Note :</p>
                                                        <ol>
                                                            <li>1. Bus Route: Nallur - Muthanampalayam - Kovilvazhi
                                                                - K. Chettipalayam - BIPL. <br />
                                                                बस मार्ग: नल्लूर - मुथनमपलयम - कोविल्वाज़ी - के.
                                                                चेट्टीपलायम - एसआईपीएल।.
                                                            </li>
                                                            <li>Food & Transport charges would be on pro - rata
                                                                basis ( consumed / utilized days ) <br />
                                                                खाद्य एवं परिवहन प्रभार यथानुपात आधार पर होंगे
                                                                (खपत/उपयोग किए गए दिन)
                                                            </li>
                                                        </ol>
                                                        <p>मैं उपयोग की जाने वाली सुविधाओं की सूची के लिए शुल्क
                                                            स्वीकार करता हूं और एतद्द्वारा अपनी स्वेच्छा से अपनी
                                                            स्वीकृति की पुष्टि करता हूं और उसका पालन करूंगा।.</p>

                                                        <p>SIGNATURE/हस्ताक्षर</p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpDeclarationHindiDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Declaration Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeedeclarationpathhindi}}"
                                        ng-hide="Employeedeclarationpathhindi == null || Employeedeclarationpathhindi == '' "
                                        ng-show="Employeedeclarationpathhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenter1EmpStatingTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணி நியமன விதிமுறைகள்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Stating
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpStatingTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpStatingTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpStatingTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpStatingTamil" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpStatingTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணி நியமன விதிமுறைகள்</h4>
                                                        </center>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        @media print {
                                                            @page {
                                                                margin: 10;
                                                            }

                                                            #btnEmpStatingTamil {
                                                                display: none;
                                                                ;
                                                            }

                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <center>THE EMPLOYEE STATING AS FOLLOWS/பணி
                                                                            நியமன விதிமுறைகள்</center>
                                                                    </td>
                                                                </tr>






                                                                <tr>
                                                                    <td> With reference to your application Bio -
                                                                        data from seeking an employment in our
                                                                        organization .We are pleased to issue this
                                                                        appointment letter to you on the following
                                                                        salient terms & conditions. </td>
                                                                    <td> எங்கள் நிறுவனத்தில் வேலை நாடி வந்த உங்களது
                                                                        மனு மற்றும் bio – data- வை எங்களது கவனத்தில்
                                                                        எடுத்திருக்கிறோம். கீழ்கண்ட முக்கியமான
                                                                        விதிகள் மற்றும் கட்டுப்பாடுகளின்
                                                                        அடிப்படையில் உங்களுக்கு பணி நியமனக்கடிதம்
                                                                        வழங்கியதற்கு மகிழ்ச்சி அடைகிறோம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 1. You are presently designated as
                                                                        <U>{{EmpDesignation}}</U>.
                                                                    </td>
                                                                    <td> நீங்கள் தற்போது <U>{{EmpDesignation}}</U>
                                                                        என்ற பணியில்
                                                                        அமர்த்தப்படுகிறீர். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 2. Your date of joining is
                                                                        <u>{{Date_Of_Joing2}}</u>.
                                                                    </td>
                                                                    <td> 2. நீங்கள் பணியில் சேர்த்த தினம்
                                                                        <u>{{Date_Of_Joing2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 3. Your age as on this date <u>{{Age}}</u>/
                                                                        D.O.B
                                                                        <u>{{Dob2}}</u>.
                                                                    </td>
                                                                    <td> 3. இன்று உங்கள் வயது<u>{{Age}}</u>/ பிறந்த
                                                                        தினம்
                                                                        <u>{{Dob2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 4. Your weekly off shall be SUNDAY on every
                                                                        week. </td>
                                                                    <td> 4. ஒவ்வொரு வாரமும் உங்களது வார விடுமுறை
                                                                        நாள் ஞாயிறு ஆகும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 5. Your working hours shall be S - I from
                                                                        8.30. AM to 5.30. PM / S - II 8.30 pm- 5.30
                                                                        am Every day , Office Time : 9.30 am - 6.30
                                                                        pm. (which is applicable) </td>
                                                                    <td> 5. ஒவ்வொரு நாளும், உங்களது வேலை நேரம் காலை
                                                                        8.30 am முதல் மாலை 5.30 pm (Day Shift)
                                                                        (Night Shift: 8.30 PM - 5.30am- வரை
                                                                        இருக்கும்), Office Time 9.30am - 6.30 pm.
                                                                        (இது உங்களது வேலை பொறுத்து மாறுபடும்). </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 6. Your present salary is Rs. <u>
                                                                            {{Gross_Salary - Performance_allowance | currency:''}}</u>
                                                                        This
                                                                        salary consist of basic+DA/HRA and other
                                                                        allowances as per break up structure
                                                                        applicable to your cadre of employees and as
                                                                        per details noticed from time to time. Your
                                                                        pay slip also contains such a break up.
                                                                    </td>
                                                                    <td> D. தற்போது உங்கள் சம்பளம் ரூபாய் RS. <u>
                                                                            {{Gross_Salary - Performance_allowance | currency:''}}</u>
                                                                        மட்டும் படிகள் பிரித்து வழங்கப்படும். இது
                                                                        உங்களைப் போன்ற மற்ற பணியாளர்களுக்கும்
                                                                        பொருந்தும். அது அவ்வப்போது அறிவிப்பு
                                                                        பலகையில் அறிவிக்கப்படும். உங்கள் சம்பள
                                                                        சீட்டு இத்தகைய விவரங்களை கொண்டு இருக்கும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 7. You are covered under the Employee State
                                                                        Insurance Corporation (ESI-0.75%) and
                                                                        Employees Provident Fund (PF-12%) schemes.
                                                                        ESI deducted from your gross earned wages.PF
                                                                        deducted from B+DA&OA earned wages. At the
                                                                        same time employer contribution (PF-12% &
                                                                        ESI-3.25) to be credited to your account in
                                                                        the concerned department. This may change if
                                                                        there is an amendment in the concerned
                                                                        department. </td>
                                                                    <td> 7. தொழிலாளர் அரசு காப்பீட்டுக் கழகம் (ESI)
                                                                        மற்றும் தொழிலாளர் வருங்கால வைப்பு நிதி (PF)
                                                                        திட்டங்களில் நீங்கள் சேர்க்கப்பட்டுள்ளீர்.
                                                                        (ESI) 0.75 %. உங்கள் மொத்த வருவாயிலிருந்து
                                                                        பிடிக்கப்படுகிறது. அதே நேரத்தில் (PF-12%)
                                                                        அடிப்படை சம்பளம் + அகவிலைப்படி மற்றும் இதர
                                                                        சலுகைகளிலிருந்து பிடித்தம் செய்து
                                                                        நிர்வாகத்தின் பங்களிப்பான ESI 3.25%/PF 12%
                                                                        உங்களது கணக்கில் சம்பத்தப்பட்ட துறையில் வரவு
                                                                        வைக்கப்படும்.. சம்பந்தபட்ட துறைகளில்
                                                                        திருத்தம் செய்யப்பட்டால் அது மாறலாம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 8. If you commit breach of any of the terms
                                                                        and conditions of this letter or if your
                                                                        commit on act of misconduct, such as
                                                                        dishonest performance is not satisfactory
                                                                        negligence insubordination, disobedience,
                                                                        theft, misappropriation of company's funds,
                                                                        drunkenness while on duty, unruly behavior
                                                                        in attendance etc., you are liable for
                                                                        appropriate disciplinary action, which may
                                                                        also lead to termination of your service W/o
                                                                        notice as per procedures contained in the
                                                                        certified standing orders. </td>
                                                                    <td> 8. தவறான நடத்தை நேர்மையற்ற செயல், பணி
                                                                        திருப்தியின்மை. அலட்சியம், விதி மீறல்,
                                                                        கீழ்படியாமை, திருட்டு, கம்பெனி தொகை கையாடல்,
                                                                        பணிக்காலத்தில் குடித்திருத்தல், சட்டமீறி
                                                                        நடத்தல், பணிக்குவராமை. போன்ற காரணங்களால்
                                                                        இக்கடிதத்தில் கூறப்பட்டுள்ள விதிமுறைகள்
                                                                        உங்களால் மீறப்படுமானால் நீங்கள் பொருத்தமான
                                                                        நடவடிக்கைக்கு உட்படுத்தப்பட்டு பணி நீக்கம்
                                                                        செய்யப்பட்டு சான்றளிக்கப்பட்ட நிறுவை விதிகள்
                                                                        அடங்கியுள்ள செயல்முறைகளின்படி பணி நீக்கம்
                                                                        செய்யப்படுவீர்கள். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 9. If for an eight consecutive working days
                                                                        absent yourself without sanction of leave or
                                                                        overstay than sanctioned leave for eight
                                                                        consecutive days, you shall be deemed to
                                                                        have abandoned your appointment voluntarily,
                                                                        terminating your service thereby, by your
                                                                        own act. Such termination shall not to be
                                                                        deemed to be retrenchment within the purview
                                                                        of clause (bb) of section 2 (00) of the
                                                                        Industrial Disputes Act, 1947. </td>
                                                                    <td> 9.விடுப்பு அங்கீகரிக்கப்படாமல் தொடர்ந்து 8
                                                                        நாட்கள் விடுப்பு எடுத்தல், தொடர்ந்து 8
                                                                        நாட்களுக்கு உத்தரவின்றி வேலைக்கு வராமல்
                                                                        தங்குதல் போன்று செயல்பட்டால் நீங்களாகவே பணி
                                                                        நியமன உத்தரவை புறக்கணிப்பதாக
                                                                        கருதப்படுவீர்கள். பிரிவு 2 (00) தொழிற்சாலை
                                                                        வழக்கு. சட்டம் 1947 இவற்றிற்குட்பட்டு பணி
                                                                        நீக்கம் செய்யப்பட்டு ஆட்குறைப்பு செய்ததாக
                                                                        கருதப்படமாட்டாது. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 10. Your normal working hours will be 8
                                                                        (eight) hours of actual work per day or 48
                                                                        (forty eight) hours per week. </td>
                                                                    <td> 10. உங்கள் பணி நேரம் நாளுக்கு 8 மணி
                                                                        நேரங்கள். (ஒரு நாள் வேலை நேரம்) அல்லது
                                                                        வாரத்திற்கு 48 மணி நேரங்கள் ஆகும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 11. For your overtime work (voluntarily
                                                                        basis beyond, the normal hours) overtime
                                                                        wage will be paid, to you at double the rate
                                                                        of your GROSS WAGES. </td>
                                                                    <td> 11. உங்களின் அதிக நேர வேலைக்கான (உங்கள்
                                                                        விருப்பத்தின் அடிப்படையில் பொதுவான கால
                                                                        அளவிற்கு மேல்) கூலி அடிப்படை மற்றும்
                                                                        அகவிலைப்படி/இதர சலுகைகள் மொத்த ஊதியத்தில்
                                                                        இதன் இருமடங்கு வழங்கப்படும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 12. You are eligible for earned leave @ one
                                                                        day for every 20 days actually worked by
                                                                        you, after completion of 240 days’ work in a
                                                                        year This is credited annually on ________of
                                                                        the following years. </td>
                                                                    <td> 12. நீங்கள் ஒரு வருடத்திற்கு 240
                                                                        நாட்களுக்கு மேல் வேலை பார்த்தால் ஒவ்வொரு 20
                                                                        நாட்களுக்கும் ஒரு நாள் ஈட்டிய விடுப்புக்கு
                                                                        தகுதியுடையவர் ஆகிறீர்கள். இது வரும் வருடம்
                                                                        _______முதல் தேதியில் ஒவ்வொரு வருடமும்
                                                                        உங்கள் கணக்கில் வைக்கப்படும். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 13. National and festival Holidays :You are
                                                                        eligible for N / F holidays as required by
                                                                        the law. </td>
                                                                    <td> 13 : தேசிய மற்றும் விழாக்கால விடுமுறைகள் :
                                                                        சட்டப்படி உள்ள (குறைந்தபட்சம் வருடத்திற்கு
                                                                        ஒன்பது நாட்கள்) எல்லா தேசிய மற்றும்
                                                                        விழாக்கால வீடுமுறைக்கும் நீங்கள்
                                                                        தகுதியுள்ளவர் ஆவர். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 14. Benefits of Bonus, gratuity are
                                                                        available in our factory and are as
                                                                        determined under the respective rules of
                                                                        Payment of Bonus Act and Payment of gratuity
                                                                        Act. (Minimum Bonus 8.33%) </td>
                                                                    <td> 14. ஊக்கத்தொகை மற்றும் பணிக்கொடை: நம்
                                                                        தொழிற்சாலையில் அரசாங்கத்தின் ஊக்கத்தொகை
                                                                        மற்றும் பணிக்கொடை சட்ட விதிகளின்படி
                                                                        வழங்கப்படும் (குறைந்தபட்ச போனஸ் 8.33%).
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 15. Rules and Regulation : Employee’s
                                                                        conditions of our company are governed by
                                                                        the factories act 1948 and the certified
                                                                        standing orders of cur company. Accordingly,
                                                                        all other terms and conditions of services
                                                                        are as per the provision of the said
                                                                        standing order. </td>
                                                                    <td> 15.விதிகளும் கட்டுப்பாடுகளும் :
                                                                        தொழிற்சாலையில் ஊழியர் நிலவரங்கள் தொழிற்சாலை
                                                                        விதி 1948 ன் படியும் நிர்வகிக்கப்படும்.
                                                                        அதன்படி மற்ற நிறுவை விதிகளின்படியும்
                                                                        நிர்வகிக்கப்படும். அதன்படி மற்ற எல்லாம்
                                                                        உங்கள் பணி விதிமுறைகள் அந்த மேற்கொள்ளப்பட்ட
                                                                        சட்ட நிலுவை விதிகளின் படியே இருக்கின்றன.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16. Miscellaneous : During the period of
                                                                        Probation or continuation as the case may be
                                                                        liable and shall accept transfer to any
                                                                        whatever be the. Interest of the company are
                                                                        involved in the state of Tamilnadu or where
                                                                        in India. </td>
                                                                    <td> 16. பலதரப்பட்டவை : தமிழ்நாட்டிலோ அல்லது
                                                                        இந்தியாவில் எங்கு வேண்டுமானும் நிறுவனத்தின்
                                                                        விருப்பப்படி பணிக்காலத்தில் அல்லது நீரந்தரம்
                                                                        செய்யப்பட்ட நிலையில் கம்பெனியின் துணை
                                                                        நிறுவனங்களில் சகோதர நிறுவனங்களில் அல்லது
                                                                        கிளைகளில் நீங்கள் பணிமாற்றத்திற்கு
                                                                        உட்படுத்தப்படலாம். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16b. You shall not, at any times disclose
                                                                        to any one any information, know - how,
                                                                        knowledge, secrets, methods, plans etc., of
                                                                        the company. </td>
                                                                    <td> 16b. எக்காலத்திலும் யாருக்கும் நிறுவனத்தின்
                                                                        எந்த தகவலையோ தொழில் நுணுக்கத்தையோ. திறனையோ,
                                                                        ரகசியங்களையோ, வழி திட்டங்களையோ
                                                                        வெளியிடக்கூடாது. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16c. During the period of your service with
                                                                        the company you shall not carry on any
                                                                        business of your own but carry out your
                                                                        duties diligently. Loyally and to the best
                                                                        of your capacity. </td>
                                                                    <td> 16c. உங்கள் பணிக்காலத்தில் சொந்த தொழில்
                                                                        ஏதும் எடுத்துச் செய்யக்கூடாது, கடமைகளை
                                                                        பொறுப்புடனும், விசுவாசத்துடனும் உங்கள்
                                                                        முழுத்திறமையுடன் எடுத்துச்செய்ய வேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16d. This appointment / probation is made
                                                                        on the understanding that the information
                                                                        given by you in your application for
                                                                        appointment is correct, true and complete.
                                                                        If it is found at any stage that the
                                                                        information given by you is not correct /
                                                                        true / complete, or you had suppressed
                                                                        information, this appointment may be
                                                                        withdrawn before you join services with us
                                                                        or your services may be terminated at any
                                                                        time after taken up employment with us. The
                                                                        address furnished in your application for
                                                                        appointment are the basic for the
                                                                        communication of all correspondence. It is
                                                                        your bounded duty to furnish the latest
                                                                        address always, keep in touch with your
                                                                        latest address to the management. </td>
                                                                    <td> 16d. இந்தப் பணி நியமனம் பயிற்சி மனு
                                                                        உண்மையானது. முழுமையாக கொடுக்கப்பட்ட தகவல்கள்
                                                                        உண்மையானவை என்ற அடிப்படையில்
                                                                        செய்யப்படுகிறது. எந்த ஓர் காலகட்டத்திலும்
                                                                        கொடுக்கப்பட்ட தகவல் தவறானது மறைக்கப்பட்ட
                                                                        தகவல் என்றால் நீங்கள் வேலைக்கு அல்லது
                                                                        பணியில் சேர்ந்த பின்னர் நீக்கப்படுவீர்,
                                                                        உங்கள் பணி நியமன மனுவில் வழங்கப்பட்ட விலாசம்
                                                                        எதிர்காலத்தில் தகவல் அனுப்புவதற்கு
                                                                        அடிப்படையாக இருக்கிறது. உங்களுடைய கடைசியாக
                                                                        மாறியுள்ள விலாசத்தை எங்களுக்கு அளிப்பது
                                                                        உங்களுடைய பொறுப்பாகும் கடைசியாக மாற்றிய
                                                                        விலாசத்தை நிர்வாகத்திற்க அனுப்பவேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16e. The management reserve the right lay -
                                                                        off with compensation of retrench our
                                                                        services at its discretion for any reason
                                                                        whatsoever and will be paid compensation as
                                                                        per the provisions of the industrial
                                                                        disputes Act. 1947. </td>
                                                                    <td> 16e. பணி நீக்கம் அல்லது பணிமுடக்கம் நிர்வாக
                                                                        விருப்பப்படி எக்காரணத்திற்காக
                                                                        செய்யப்பட்டாலும் தொழிற்சாலை சட்டம் 1947 ன்
                                                                        படி நஷ்டஈடு வழங்கப்படுவீர்கள். </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 17. Residential Address Your residential
                                                                        address as stated above is as furnished by
                                                                        and is deemed as the address for any
                                                                        specific communication or notice to you. You
                                                                        should keep the management information of
                                                                        any change in your address that may arise at
                                                                        your end. </td>
                                                                    <td> 17. வீட்டு விலாசம் : உங்கள் குடியிருப்பு
                                                                        விலாசம் உங்களால் மேலே கொடுக்கப்பட்டது. எந்த
                                                                        குறிப்பிட்ட தகவலும் உங்களுக்கு அறிவிப்பு
                                                                        கொடுக்கவும் சரியானதாக கருதப்படுகிறது
                                                                        நிர்வாகத்திற்கு தகவல் தெரிவிப்பதுடன் எந்த
                                                                        விலாச மாற்றத்தையும் தெரிவிக்க வேண்டும்.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 18. Any permanent workman desirous of
                                                                        leaving the service shall give one month's
                                                                        notice and return all company belongings.
                                                                    </td>
                                                                    <td> 18. எந்த நிரத்திரத் தொழிலாளியாவது தானாகவே
                                                                        வேலையை விட்டு விளக்கிக் கொள்ள விரும்பினால்
                                                                        ஒரு மாத முன்னறிவிப்பினை நிர்வாகத்திடம்
                                                                        கொடுத்து மற்றும் நிறுவனத்தின் அனைத்து
                                                                        உடைமைகளையும் நிர்வாகத்திற்க்கு திருப்பிதந்து
                                                                        வேலையிலுருந்து விலகிக் கொள்ளலாம். </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpStatingTamilDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Stating
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeestatingpathtamil}}"
                                        ng-hide="Employeestatingpathtamil == null || Employeestatingpathtamil == '' "
                                        ng-show="Employeestatingpathtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenter1EmpStatingHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE STATING AS FOLLOWS
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Stating
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpStatingHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpStatingHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpStatingHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpStatingHindi" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpStatingHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>THE EMPLOYEE STATING AS FOLLOWS</h4>
                                                        </center>



                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        @media print {
                                                            @page {
                                                                margin: 10;
                                                            }

                                                            #btnEmpStatingHindi {
                                                                display: none;
                                                                ;
                                                            }

                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">THE EMPLOYEE STATING AS FOLLOWS
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:49.8%"> With reference to your
                                                                        application Bio - data from seeking an
                                                                        employment in our organization .We are
                                                                        pleased to issue this appointment letter to
                                                                        you on the following salient terms &
                                                                        conditions. </td>
                                                                    <td> हमने अपनी कंपनी में नौकरी के लिए आवेदन करने
                                                                        के लिए आपके आवेदन और बायोडाटा पर ध्यान दिया
                                                                        है। हमें आपको निम्नलिखित महत्वपूर्ण नियमों
                                                                        और प्रतिबंधों के अधीन नियुक्ति पत्र जारी
                                                                        करने में प्रसन्नता हो रही है।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 1. You are presently designated as
                                                                        <u>{{EmpDesignation}}</u>.
                                                                    </td>
                                                                    <td> आप वर्तमान में <u>{{EmpDesignation}}</u>
                                                                        कार्यरत हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 2. Your date of joining is
                                                                        <u>{{Date_Of_Joing2}}</u>.
                                                                    </td>
                                                                    <td> 2. आप सेवा में शामिल होने की तिथि
                                                                        <u>{{Date_Of_Joing2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 3. Your age as on this date <u>{{Age}} </u>
                                                                        / D.O.B
                                                                        <u>{{Dob2}}</u> .
                                                                    </td>
                                                                    <td> 3. आज आपकी उम्र <u>{{Age}}</u> / जन्मदिन है
                                                                        <u>{{Dob2}}</u>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 4. Your weekly off shall be SUNDAY on every
                                                                        week. </td>
                                                                    <td> 4. रविवार आपका साप्ताहिक अवकाश है. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 5. Your working hours shall be S - I from
                                                                        8.30. AM to 5.30. PM / S - II 8.30 pm- 5.30
                                                                        am Every day , Office Time : 9.30 am - 6.30
                                                                        pm. (which is applicable) </td>
                                                                    <td> 5. हर दिन, आपके काम करने का समय सुबह 8.30am
                                                                        बजे है शाम 5.30pm बजे से शाम 8.30pm-5.30Am
                                                                        बजे (8.30 बजे से 5.30 बजे तक), कार्यालय समय
                                                                        सुबह 9.30am बजे से शाम 6.30pm बजे तक। (इस पर
                                                                        लागू होता है)। </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 6. Your present salary is Rs. <u>
                                                                            {{Gross_Salary - Performance_allowance | currency:''}}</u>
                                                                        This
                                                                        salary consist of basic+DA/HRA and other
                                                                        allowances as per break up structure
                                                                        applicable to your cadre of employees and as
                                                                        per details noticed from time to time. Your
                                                                        pay slip also contains such a break up.
                                                                    </td>
                                                                    <td> 6. वर्तमान में आपका वेतन रु. <u>
                                                                            {{Gross_Salary - Performance_allowance | currency:''}}</u>
                                                                        केवल
                                                                        कदम
                                                                        अलग से दिए जाएंगे। वही आप जैसे अन्य
                                                                        कर्मचारियों के लिए जाता है। इसकी घोषणा
                                                                        समय-समय पर नोटिस बोर्ड पर की जाएगी। आपकी
                                                                        वेतन पर्ची में ऐसे विवरण होंगे। </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 7. You are covered under the Employee State
                                                                        Insurance Corporation (ESI-0.75%) and
                                                                        Employees Provident Fund (PF-12%) schemes.
                                                                        ESI deducted from your gross earned wages.PF
                                                                        deducted from B+DA&OA earned wages. At the
                                                                        same time employer contribution (PF-12% &
                                                                        ESI-3.25) to be credited to your account in
                                                                        the concerned department. This may change if
                                                                        there is an amendment in the concerned
                                                                        department. </td>
                                                                    <td> 7. आप कर्मचारी राज्य बीमा निगम (ईएसआई) और
                                                                        कर्मचारी भविष्य निधि (पीएफ) योजनाओं के
                                                                        अंतर्गत आते हैं। (ईएसआई) 0.75%। आपकी सकल आय
                                                                        में से कटौती। साथ ही (पीएफ-12%) मूल वेतन +
                                                                        ग्रेच्युटी और अन्य भत्तों और प्रबंधन के
                                                                        योगदान से कटौती ईएसआई 3.25% / पीएफ 12%
                                                                        अर्जित क्षेत्र में आपके खाते में जमा की
                                                                        जाएगी। संबंधित क्षेत्रों में संशोधन होने पर
                                                                        यह बदल सकता है।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 8. If you commit breach of any of the terms
                                                                        and conditions of this letter or if your
                                                                        commit on act of misconduct, such as
                                                                        dishonest performance is not satisfactory
                                                                        negligence insubordination, disobedience,
                                                                        theft, misappropriation of company's funds,
                                                                        drunkenness while on duty, unruly behavior
                                                                        in attendance etc., you are liable for
                                                                        appropriate disciplinary action, which may
                                                                        also lead to termination of your service W/o
                                                                        notice as per procedures contained in the
                                                                        certified standing orders. </td>
                                                                    <td> 8. कदाचार बेईमानी, नौकरी में असंतोष।
                                                                        लापरवाही, नियमों का उल्लंघन, अवज्ञा, चोरी,
                                                                        कंपनी के धन का दुरूपयोग, ड्यूटी पर मद्यपान,
                                                                        दुराचार, अनुपस्थिति। यदि आप इस तरह के कारणों
                                                                        से इस पत्र की शर्तों का उल्लंघन करते हैं, तो
                                                                        आप उचित कार्रवाई के अधीन होंगे और प्रमाणित
                                                                        कंपनी नियमों में निहित प्रक्रियाओं के अनुसार
                                                                        समाप्त किया जा सकता है।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 9. If for an eight consecutive working days
                                                                        absent yourself without sanction of leave or
                                                                        overstay than sanctioned leave for eight
                                                                        consecutive days, you shall be deemed to
                                                                        have abandoned your appointment voluntarily,
                                                                        terminating your service thereby, by your
                                                                        own act. Such termination shall not to be
                                                                        deemed to be retrenchment within the purview
                                                                        of clause (bb) of section 2 (00) of the
                                                                        Industrial Disputes Act, 1947. </td>
                                                                    <td> 9.यदि आप बिना अनुमति के लगातार 8 दिनों की
                                                                        छुट्टी लेते हैं, बिना अनुमति के लगातार 8
                                                                        दिनों तक काम से अनुपस्थित रहते हैं, तो आप
                                                                        स्वयं नियुक्ति आदेश की अवहेलना करने वाले
                                                                        माने जाएंगे। धारा 2 (00) फैक्टरी सूट।
                                                                        अधिनियम 1947 को इनके अंतर्गत छँटनी या छँटनी
                                                                        नहीं समझा जाएगा.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 10. Your normal working hours will be 8
                                                                        (eight) hours of actual work per day or 48
                                                                        (forty eight) hours per week. </td>
                                                                    <td> 10. आपके काम के घंटे प्रतिदिन 8 घंटे हैं।
                                                                        प्रति दिन काम के घंटे) या प्रति सप्ताह 48
                                                                        घंटे।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 11. For your overtime work (voluntarily
                                                                        basis beyond, the normal hours) overtime
                                                                        wage will be paid, to you at double the rate
                                                                        of your GROSS WAGES. </td>
                                                                    <td> 11. आपके ओवरटाइम काम के लिए मूल वेतन और
                                                                        ग्रेच्युटी/अन्य भत्ते (आपके विकल्प पर
                                                                        सामान्य अवधि से अधिक) का भुगतान कुल मजदूरी
                                                                        के दोगुने पर किया जाएगा।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 12. You are eligible for earned leave @ one
                                                                        day for every 20 days actually worked by
                                                                        you, after completion of 240 days’ work in a
                                                                        year This is credited annually on ________of
                                                                        the following years. </td>
                                                                    <td> 12. यदि आप एक वर्ष में 240 दिनों से अधिक
                                                                        काम करते हैं, तो आप प्रत्येक 20 दिनों के लिए
                                                                        एक दिन की अर्जित छुट्टी के हकदार हैं। आपका
                                                                        खाता हर साल _______ तारीख को क्रेडिट किया
                                                                        जाएगा।. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 13. National and festival Holidays :You are
                                                                        eligible for N / F holidays as required by
                                                                        the law. </td>
                                                                    <td> 13. राष्ट्रीय और त्योहार की छुट्टियां:
                                                                        आप सभी वैधानिक राष्ट्रीय और अवकाश (प्रति
                                                                        वर्ष न्यूनतम नौ दिन) के हकदार हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 14. Benefits of Bonus, gratuity are
                                                                        available in our factory and are as
                                                                        determined under the respective rules of
                                                                        Payment of Bonus Act and Payment of gratuity
                                                                        Act. (Minimum Bonus 8.33%) </td>
                                                                    <td>14. प्रोत्साहन और ग्रेच्युटी:
                                                                        हमारे कारखाने में, वैधानिक प्रावधानों
                                                                        (न्यूनतम बोनस 8.33%) के अनुसार सरकारी
                                                                        प्रोत्साहन और ग्रेच्युटी का भुगतान किया जाता
                                                                        है।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 15. Rules and Regulation : Employee’s
                                                                        conditions of our company are governed by
                                                                        the factories act 1948 and the certified
                                                                        standing orders of cur company. Accordingly,
                                                                        all other terms and conditions of services
                                                                        are as per the provision of the said
                                                                        standing order. </td>
                                                                    <td> 15. नियम और शर्तें:
                                                                        कारखाने में कर्मचारियों की शर्तें भी कारखाना
                                                                        अधिनियम 1848 द्वारा शासित होती हैं। तदनुसार,
                                                                        आपके रोजगार की अन्य सभी शर्तें लागू वैधानिक
                                                                        प्रावधानों के अधीन हैं।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16. Miscellaneous : During the period of
                                                                        Probation or continuation as the case may be
                                                                        liable and shall accept transfer to any
                                                                        whatever be the. Interest of the company are
                                                                        involved in the state of Tamilnadu or where
                                                                        in India. </td>
                                                                    <td>16. विविध :
                                                                        सेवा की अवधि के दौरान या स्थानांतरण पर कंपनी
                                                                        के विवेक पर आपको कंपनी की किसी भी सहायक
                                                                        कंपनी, सहयोगी कंपनियों या शाखाओं में
                                                                        स्थानांतरित किया जा सकता है।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16b. You shall not, at any times disclose
                                                                        to any one any information, know - how,
                                                                        knowledge, secrets, methods, plans etc., of
                                                                        the company. </td>
                                                                    <td>16बी. किसी भी समय कंपनी की जानकारी या
                                                                        व्यावसायिक खुफिया, क्षमताओं, रहस्यों या
                                                                        रोडमैप का खुलासा नहीं किया जा सकता है।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16c. During the period of your service with
                                                                        the company you shall not carry on any
                                                                        business of your own but carry out your
                                                                        duties diligently. Loyally and to the best
                                                                        of your capacity. </td>
                                                                    <td>16ग. आपको अपने कार्यकाल के दौरान अपना खुद का
                                                                        कोई व्यवसाय नहीं करना चाहिए, आपको अपनी
                                                                        योग्यता के अनुसार जिम्मेदारी और निष्ठा के
                                                                        साथ कर्तव्यों का पालन करना चाहिए।</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16d. This appointment / probation is made
                                                                        on the understanding that the information
                                                                        given by you in your application for
                                                                        appointment is correct, true and complete.
                                                                        If it is found at any stage that the
                                                                        information given by you is not correct /
                                                                        true / complete, or you had suppressed
                                                                        information, this appointment may be
                                                                        withdrawn before you join services with us
                                                                        or your services may be terminated at any
                                                                        time after taken up employment with us. The
                                                                        address furnished in your application for
                                                                        appointment are the basic for the
                                                                        communication of all correspondence. It is
                                                                        your bounded duty to furnish the latest
                                                                        address always, keep in touch with your
                                                                        latest address to the management. </td>
                                                                    <td>16डी. यह भर्ती प्रशिक्षण आवेदन वास्तविक है।
                                                                        इसकी संपूर्णता में प्रदान की गई जानकारी इस
                                                                        आधार पर बनाई जाती है कि यह सत्य है। यदि किसी
                                                                        भी समय प्रदान की गई जानकारी झूठी है या
                                                                        जानकारी रोक रही है, तो आपको रोजगार या रोजगार
                                                                        से हटा दिया जाएगा, और आपके रोजगार आवेदन पत्र
                                                                        में दिया गया पता भविष्य के संचार का आधार है।
                                                                        यह आपकी जिम्मेदारी है कि आप हमें अपना पिछला
                                                                        बदला हुआ पता प्रदान करें और प्रशासन को अंतिम
                                                                        बदला हुआ पता भेजें।
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 16e. The management reserve the right lay -
                                                                        off with compensation of retrench our
                                                                        services at its discretion for any reason
                                                                        whatsoever and will be paid compensation as
                                                                        per the provisions of the industrial
                                                                        disputes Act. 1947. </td>
                                                                    <td>16ई. आप कारखाना अधिनियम, 1947 के अनुसार
                                                                        मुआवजे के हकदार हैं, चाहे बर्खास्तगी या
                                                                        छंटनी किसी भी कारण से प्रबंधन के विवेक पर
                                                                        हो।.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 17. Residential Address Your residential
                                                                        address as stated above is as furnished by
                                                                        and is deemed as the address for any
                                                                        specific communication or notice to you. You
                                                                        should keep the management information of
                                                                        any change in your address that may arise at
                                                                        your end. </td>
                                                                    <td>घर का पता:
                                                                        आपका आवासीय पता आपके द्वारा ऊपर दिया गया है।
                                                                        आपको सूचित करने के लिए उपयुक्त समझी जाने
                                                                        वाली कोई भी विशिष्ट जानकारी प्रबंधन और पते
                                                                        के किसी भी परिवर्तन को सूचित करना चाहिए।.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> 18. Any permanent workman desirous of
                                                                        leaving the service shall give one month's
                                                                        notice and return all company belongings.
                                                                    </td>
                                                                    <td>18. कोई भी आकस्मिक कर्मचारी जो स्वेच्छा से
                                                                        इस्तीफा देना चाहता है, प्रबंधन को एक महीने
                                                                        का नोटिस देकर और कंपनी की सारी संपत्ति
                                                                        प्रबंधन को सौंपकर रोजगार से वापस ले सकता
                                                                        है।.</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpStatingHindiDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Stating
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeestatingpathhindi}}"
                                        ng-hide="Employeestatingpathhindi == null || Employeestatingpathhindi == '' "
                                        ng-show="Employeestatingpathhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenter1EmpAgreementTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    பணியாளர் நம்பகத்தன்மை மற்றும் வெளிப்படுத்தாத ஒப்பந்தம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Agreement
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAgreementTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAgreementTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpAgreementTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAgreementTamil"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAgreementTamil">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnEmpAgreementTamil {
                                                            display: none;
                                                            ;
                                                        }

                                                    }
                                                    </style>
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>பணியாளர் நம்பகத்தன்மை மற்றும் வெளிப்படுத்தாத
                                                                ஒப்பந்தம்</h4>
                                                        </center>



                                                        <p>நல்ல ஆலோசனையுடனும், பிரிட்டானியா லேபிள்ஸ் இந்தியா பிரைவேட்
                                                            லிமிடெட்(கம்பெனி) எனது வேலைவாய்ப்பு அல்லது
                                                            தொடர்ச்சியான வேலைவாய்ப்பைக் கருத்தில் கொண்டு, அடியிற்
                                                            கையொப்பமிட்ட ஊழியர் நான் இந்த ஒப்பந்தத்தின் விதிமுறைகளை
                                                            (“ஒப்பந்தம்”) ஒப்புக்கொள்கிறேன்:</p>

                                                        <h3>1. ரகசிய தகவல்</h3>
                                                        <p><b><u>அ. நிறுவனத்தின் தகவல்:</u></b> எனது வேலைவாய்ப்பு
                                                            காலத்திலும், அதன்பிறகு மூன்று வருட காலத்திலும்,
                                                            நிறுவனத்தின் நன்மை தவிர, அல்லது எந்தவொரு நபருக்கும்,
                                                            நிறுவனத்துக்கும் அல்லது நிறுவனத்தின் எழுத்துப்பூர்வ
                                                            அங்கீகாரமின்றி இருக்கும் நிறுவனத்துக்கும், நிறுவனத்தின்
                                                            எந்த ரகசிய தகவலும் நம்பிக்கையுடன் இருப்பதற்கும், எல்லா
                                                            நேரங்களிலும் நம்பிக்கையுடன் இருக்க நான்
                                                            ஒப்புக்கொள்கிறேன். எனக்கு புரிவது என்னவென்றால் “ரகசிய
                                                            தகவல்” என்பது எந்தவொரு நிறுவனத்தின் தனியுரிம தகவல்,
                                                            தொழில்நுட்ப தரவு, வர்த்தக ரகசியங்கள் அல்லது ஆராய்ச்சி,
                                                            தயாரிப்புத் திட்டங்கள், தயாரிப்புகள், சேவைகள்,
                                                            வாடிக்கையாளர் பட்டியல்கள், சந்தைகள், மென்பொருள்,
                                                            முன்னேற்றங்கள், கண்டுபிடிப்புகள் உள்ளிட்டவற்றை
                                                            உள்ளடக்கியது, ஆனால் அவை மட்டுமல்ல. செயல்முறைகள்,
                                                            சூத்திரங்கள், தொழில்நுட்பம், வடிவமைப்புகள், வரைபடங்கள்,
                                                            பொறியியல், வன்பொருள் உள்ளமைவு தகவல், சந்தைப்படுத்தல்,
                                                            நிதி அல்லது நிறுவனம் எனக்கு நேரடியாகவோ அல்லது
                                                            மறைமுகமாகவோ வெளிப்படுத்திய பிற வணிகத் தகவல்கள்.</p>

                                                        <p><b><u>ஆ. விதிவிலக்குகள்:</u></b> நான் நிரூபிக்கக்கூடிய
                                                            ரகசிய தகவலின் பகுதிக்கு மேற்கூறிய கடமைகள் மற்றும்
                                                            கட்டுப்பாடுகள் பொருந்தாது:</p>
                                                        <ul>
                                                            <li>கிடைத்தது அல்லது பொதுவாக பொதுமக்களுக்கு கிடைத்தது
                                                                அல்லது</li>
                                                            <li>கோரப்பட்டது அல்லது சட்டப்பூர்வமாக
                                                                கட்டாயப்படுத்தப்பட்டது (வாய்வழி கேள்விகள்,
                                                                விசாரணையாளர்கள், தகவல் அல்லது ஆவணங்களுக்கான
                                                                கோரிக்கைகள், சப்போனா, சிவில் அல்லது கிரிமினல்
                                                                புலனாய்வு கோரிக்கை அல்லது ஒத்த செயல்முறை) அல்லது
                                                                தடைசெய்யப்பட்ட எந்தவொரு வெளிப்பாட்டையும் செய்ய ஒரு
                                                                ஒழுங்குமுறை அமைப்பு தேவைப்படுகிறது இல்லையெனில், இந்த
                                                                ஒப்பந்தத்தால் கட்டுப்படுத்தப்பட்டால், நான்
                                                                கட்டுப்படுவேன்.</li>
                                                            <li>அத்தகைய எந்தவொரு கோரிக்கையையும் (களை) உடனடியாக
                                                                அறிவித்து நிறுவனத்திற்கு வழங்குவதன் மூலம் நிறுவனம்
                                                                பொருத்தமான பாதுகாப்பு உத்தரவு அல்லது பிற பொருத்தமான
                                                                தீர்வுகளைத் தேடலாம் மற்றும்</li>
                                                            <li>அத்தகைய பாதுகாப்பு உத்தரவைப் பெறுவதில்
                                                                நிறுவனத்திற்கு நியாயமான உதவிகளை வழங்குதல். அத்தகைய
                                                                பாதுகாப்பு உத்தரவு அல்லது பிற தீர்வுகள்
                                                                பெறப்படாவிட்டால் அல்லது நிறுவனம் இங்கு தள்ளுபடியை
                                                                வழங்கினால், ரகசிய தகவலின் அந்த பகுதியை (மற்றும் அந்த
                                                                பகுதியை மட்டுமே) நான் வழங்கலாம், இது நிறுவனத்திற்கு
                                                                நியாயமான முறையில் ஏற்றுக்கொள்ளக்கூடிய ஆலோசனையின்
                                                                எழுத்துப்பூர்வ கருத்தில், நான் சட்டப்பூர்வமாக
                                                                கட்டாயப்படுத்தப்பட்டது அல்லது வெளிப்படுத்த
                                                                தேவைப்பட்டால்; வழங்கப்பட்டால், இரகசியத்தன்மை
                                                                வெளிப்படுத்தப்படும் எந்தவொரு ரகசிய தகவலுக்கும்
                                                                வழங்கப்படும் என்ற நம்பகமான உத்தரவாதத்தைப் பெற
                                                                நியாயமான முயற்சிகளைப் பயன்படுத்துவேன்.</li>
                                                        </ul>

                                                        <p><b><u>இ. முன்னாள் வேலைவாய்ப்பு தகவல்:</u></b>
                                                            நிறுவனத்துடனான எனது வேலையின் போது நான் ஒப்புக்கொள்வது
                                                            என்னவென்றால், முறையற்ற முறையில் பயன்படுத்தக்கூடாதுஅல்லது
                                                            எந்த தனியுரிம தகவலையும் வெளியிடவும் அல்லது எந்தவொரு
                                                            முன்னாள் அல்லது ஒரே நேரத்தில் முதலாளியின் வர்த்தக
                                                            இரகசியங்கள் அல்லது மற்ற நபர் அல்லது எந்தவொரு
                                                            வெளியிடப்படாத ஆவணத்தையும் நிறுவனத்தின் வளாகத்திற்கு
                                                            கொண்டு வரக்கூடாது அல்லது அத்தகைய எந்தவொரு முதலாளிக்கும்
                                                            சொந்தமான தனியுரிம தகவல் அல்லது அத்தகைய முதலாளி, நபர்
                                                            அல்லது நபர் அல்லது நிறுவனம் எழுத்துப்பூர்வமாக ஒப்புக்
                                                            கொள்ளாவிட்டால்.</p>

                                                        <p><u><b>ஈ. மூன்றாம் தரப்பு தகவல்:</u></b>எதிர்காலத்தில்
                                                            மூன்றாம் தரப்பினரிடமிருந்து அவர்களின் ரகசிய அல்லது
                                                            தனியுரிம தகவல்களை சில வரையறுக்கப்பட்ட நோக்கங்களுக்காக
                                                            மட்டுமே பயன்படுத்துவேன் என்பதை நான் உணர்கிறேன். இதுபோன்ற
                                                            அனைத்து ரகசிய அல்லது தனியுரிம தகவல்களையும் கடுமையான
                                                            நம்பிக்கையுடன் வைத்திருக்க ஒப்புக்கொள்கிறேன், அதை
                                                            எந்தவொரு நபருக்கும், நிறுவனத்திற்கும் அல்லது
                                                            நிறுவனத்திற்கும் வெளியிடக்கூடாது அல்லது அத்தகைய மூன்றாம்
                                                            தரப்பினருடனான நிறுவனத்தின் உடன்படிக்கைக்கு இணங்க
                                                            நிறுவனத்திற்காக எனது பணிகளை மேற்கொள்வதில் தேவையானதைத்
                                                            தவிர அதைப் பயன்படுத்தக்கூடாது.</p>

                                                        <h3>2. நிர்வாக பொருட்களை திரும்ப பெறுதல்:</h3>
                                                        <p>எனது வேலையில் இருந்து விலகும் போது, நிறுவனத்தின் வணிகம்
                                                            தொடர்பான அனைத்து ஆவணங்களும், அறிக்கைகள், சுருக்கங்கள்,
                                                            பட்டியல்கள், கடிதப் போக்குவரத்து, தகவல், கணினி
                                                            கோப்புகள், கணினி வட்டுகள் மற்றும் நிறுவனத்துடன் எனது
                                                            வேலையின் போது நான் பெற்ற மற்ற எல்லா பொருட்களும் மற்றும்
                                                            அத்தகைய பொருட்களின் அனைத்து நகல்களும் திரும்ப
                                                            ஒப்படைத்துவிடுவேன்.</p>

                                                        <h3>3. சட்டபூர்வமான மற்றும் தகுதியான தீர்வுகள்:</h3>
                                                        <p>இந்த ஒப்பந்தத்தின் எந்தவொரு விதிகளை மீறினாலும் தடை
                                                            உத்தரவைப் பெற நிறுவனத்திற்கு உரிமை உண்டு என்பதையும் நான்
                                                            உணர்கிறேன். அத்தகைய போட்டி அல்லது வெளிப்பாட்டைத் தடுக்க
                                                            ஒரு தடை உத்தரவு, குறிப்பிட்ட செயல்திறன் அல்லது பிற சமமான
                                                            தீர்வைப் பெற நிறுவனத்திற்கு உரிமை உண்டு என்பதையும், மற்ற
                                                            சட்ட தீர்வுகளுக்கு நிறுவனத்திற்கு உரிமை வழங்கலாம்
                                                            என்பதையும் நான் உணர்கிறேன். வழக்கறிஞரின் கட்டணம் மற்றும்
                                                            செலவுகள் உட்பட.</p>

                                                        <h3>4. வாரிசுகள் மற்றும் பணிகள்:</h3>
                                                        <p>இந்த ஒப்பந்தம் எனது வாரிசுகள், நிர்வாகிகள், நிர்வாகிகள்
                                                            மற்றும் பிற சட்ட பிரதிநிதிகள் மீது கட்டுப்படும், மேலும்
                                                            நிறுவனம், அதன் வாரிசுகள் மற்றும் அதன் பணியாளர்களின்
                                                            நலனுக்காக இருக்கும். இந்த ஒப்பந்தத்தின் கீழ் எனது
                                                            எந்தவொரு உரிமைகளையும் நான் ஒதுக்கவோ, அல்லது எனது கடமைகள்
                                                            எதையும் ஒப்படைக்கவோ கூடாது.</p>

                                                        <h3>5. தொடர் கடமைகள்:</h3>
                                                        <p>இந்த ஒப்பந்தத்தில் விவரிக்கப்பட்டுள்ள கடமைகள் மற்றும்
                                                            உரிமைகள் நிறுவனத்துடனான எனது வேலைவாய்ப்பு
                                                            நிறுத்தப்படுவதைத் தக்கவைக்கும்.</p>

                                                        <h3>6. சீர்திருத்தல்:</h3>
                                                        <p>எப்போது வேண்டுமானாலும், இந்த ஒப்பந்தத்தின் ஒவ்வொரு
                                                            ஏற்பாடும் பொருந்தக்கூடிய சட்டத்தின் கீழ் பயனுள்ளதாகவும்
                                                            செல்லுபடியாகும் விதமாகவும் விளக்கப்படும், ஆனால் இந்த
                                                            ஒப்பந்தத்தின் எந்தவொரு ஏற்பாடும் எந்தவொரு பொருந்தக்கூடிய
                                                            சட்டம் அல்லது விதியின் கீழ் எந்த வகையிலும் செல்லாதது,
                                                            சட்டவிரோதமானது அல்லது செயல்படுத்த முடியாதது எனக்
                                                            கருதப்பட்டால் எந்தவொரு அதிகார வரம்பும், அத்தகைய
                                                            செல்லுபடியாகாத தன்மை, சட்டவிரோதம் அல்லது செயல்படுத்த
                                                            முடியாதது வேறு எந்த விதிமுறையையும் அல்லது வேறு எந்த
                                                            அதிகார வரம்பையும் பாதிக்காது, ஆனால் இந்த ஒப்பந்தம்
                                                            சீர்திருத்தப்பட்டு, கட்டாயப்படுத்தப்பட்டு, அத்தகைய
                                                            அதிகார வரம்பில் செயல்படுத்தப்படும், இது போன்ற தவறான,
                                                            சட்டவிரோத அல்லது செயல்படுத்த முடியாத விதிகள் இங்கு
                                                            ஒருபோதும் இல்லாதது போல. </p>

                                                        <h3>7. அரசு சட்டம்:</h3>
                                                        <p>இந்த ஒப்பந்தம் சட்ட விதிகளின் முரண்பாடுகளைப்
                                                            பொருட்படுத்தாமல் தமிழக மாநிலத்தின் சட்டங்களால்
                                                            நிர்வகிக்கப்படும். </p>

                                                        <p>சாட்சி அதற்கென்றே உள்ள தரப்புகள் இந்த ஒப்பந்தத்தை
                                                            நிறைவேற்றுகின்றன</p>


                                                        <p style="text-align:left;">ஏற்றுக்கொள்வது/மற்றும்
                                                            ஒப்புக்கொள்வது<span style="float:right;">பிரிட்டானியா லேபிள்ஸ் இந்தியா பிரைவேட்
                                                            லிமிடெட்(கம்பெனி)</span></p>
                                                        <p style="text-align:left;">பணியாளரின் பெயர் /
                                                            கையொப்பம்<span style="float:right;">மேலளார்
                                                                கையொப்பம்</span></p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpAgreementTamilDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Agreement
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeeagreemantpathtamil}}"
                                        ng-hide="Employeeagreemantpathtamil == null || Employeeagreemantpathtamil == '' "
                                        ng-show="Employeeagreemantpathtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade emp-modal" id="ModalCenter1EmpAgreementHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE AGREEMENT
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Agreement
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpAgreementHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpAgreementHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpAgreementHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAgreementHindi"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpAgreementHindi">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnEmpAgreementHindi {
                                                            display: none;
                                                            ;
                                                        }

                                                    }
                                                    </style>
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE
                                                                AGREEMENT<br />कर्मचारी की
                                                                गोपनीयता और गैर प्रकटीकरण समझौते</h4>
                                                        </center>


                                                        <p>FOR GOOD CONSIDERATION and in consideration of my
                                                            employment or continued
                                                            employment by {{Clientname}} (the
                                                            Company”), I, the
                                                            undersigned employee, hereby agree to the terms of this
                                                            agreement (the
                                                            “Agreement”):</p>
                                                        <p>अच्छी सहमति के लिए और ब्रिटानिया गारमेंट पैकेजिंग
                                                            प्राइवेट लिमिटेड (कंपनी)
                                                            द्वारा मेरे रोजगार या निरंतर रोजगार पर विचार करते हुए,
                                                            मैं, हस्ताक्षर किया हुआ
                                                            कर्मचारी, इस समझौता ("एग्रीमेंट") की शर्तों से सहमत हैं:
                                                        </p>

                                                        <h3>1. CONFIDENTIAL INFORMATION</h3>
                                                        <p><b><u>a. Company Information :</u></b> - I agree at all
                                                            times during the term of
                                                            my employment and for a period of three years
                                                            thereafter, to hold in strictest
                                                            confidence, and not to use, except for the benefit of
                                                            the Company, or to
                                                            disclose to any person, firm or corporation without
                                                            written authorization of the
                                                            Company, any Confidential Information of the Company. I
                                                            understand that
                                                            “Confidential Information” means any Company proprietary
                                                            information, technical
                                                            data, trade secrets or know-how, including, but not
                                                            limited to, research,
                                                            product plans, products, services, customer lists,
                                                            markets, software,
                                                            developments, inventions, processes, formulas,
                                                            technology, designs, drawings,
                                                            engineering, hardware configuration information,
                                                            marketing, finances or other
                                                            business information disclosed to me by the Company
                                                            either directly or
                                                            indirectly.</p>

                                                        <h3>1. गोपनीय सूचना</h3>
                                                        <p><b><u>i. कंपनी की जानकारी </u></b> - मैं अपने रोजगार की
                                                            अवधि के दौरान और उसके बाद
                                                            तीन साल की अवधि के लिए सहमत हूँ, कंपनी के लाभ के लिए,
                                                            कंपनी के लिखित प्राधिकरण
                                                            के बिना किसी भी व्यक्ति, फर्म या निगम के किसी भी
                                                            व्यक्ति, कंपनी या निगम को प्रकट
                                                            करने के अलावा, सबसे अधिक कठोरतम विश्रंभ, और उपयोग नहीं
                                                            करना। मैं समझता हूँ कि
                                                            "गोपनीय जानकारी" का अर्थ किसी भी कंपनी के सांपातिक वाली
                                                            जानकारी, तकनीकी डेटा,
                                                            व्यापार रहस्य, लेकिन शोध, उत्पाद योजनाओं, उत्पादों,
                                                            सेवाओं, ग्राहक सूचियों,
                                                            बाजारों, सॉफ्टवेयर, विकास, आविष्कारों तक सीमित नहीं है,
                                                            प्रक्रिया, सूत्र,
                                                            प्रौद्योगिकी, डिजाइन, चित्र, इंजीनियरिंग, हार्डवेयर
                                                            कॉन्फ़िगरेशन जानकारी, विपणन,
                                                            वित्त या अन्य व्यावसायिक जानकारी कंपनी द्वारा मेरे लिए
                                                            प्रत्यक्ष या अप्रत्यक्ष
                                                            रूप से बताई गई है। </p>

                                                        <p>1. <b><u>Exceptions</u></b> - The foregoing obligations
                                                            and restrictions do not
                                                            apply to that part of the Confidential Information that
                                                            I can demonstrate:</p>

                                                        <ul type="none">
                                                            <li>i. was available or became generally available to
                                                                the public; or</li>
                                                            <li>ii. was requested or legally compelled (by oral
                                                                questions, interrogatories,
                                                                requests for information or documents, subpoena,
                                                                civil or criminal
                                                                investigative demand or similar process) or is
                                                                required by a regulatory body
                                                                to make any disclosure which is prohibited or
                                                                otherwise constrained by this
                                                                Agreement, provided, that I shall
                                                            </li>
                                                            <li>
                                                                <ul type="none">
                                                                    <li>a. provide the Company with prompt notice of
                                                                        any such request(s) so
                                                                        that the Company may seek an appropriate
                                                                        protective order or other
                                                                        appropriate remedy and </li>
                                                                    <li>b. Provide reasonable assistance to the
                                                                        Company in obtaining any
                                                                        such protective order. If such protective
                                                                        order or other remedy is
                                                                        not obtained or the Company grants a waiver
                                                                        hereunder, then I may
                                                                        furnish that portion (and only that portion)
                                                                        of the Confidential
                                                                        Information which, in the written opinion of
                                                                        counsel reasonably
                                                                        acceptable to the Company, I am legally
                                                                        compelled or am otherwise
                                                                        required to disclose; provided, that I shall
                                                                        use reasonable efforts
                                                                        to obtain reliable assurance that
                                                                        confidentiality be accorded any
                                                                        Confidential Information so disclosed.</li>
                                                                </ul>

                                                            </li>
                                                        </ul>


                                                        <p>
                                                            1. अपवाद - पूर्वगामी दायित्व और प्रतिबंध गोपनीय जानकारी
                                                            के उस हिस्से पर लागू
                                                            नहीं होते हैं जिन्हें मैं प्रदर्शित कर सकता हूं:
                                                        </p>

                                                        <ul type="none">
                                                            <li>i. आम तौर पर जनता के लिए उपलब्ध था</li>
                                                            <li>ii. मैं अनुरोध किया गया था या कानूनी रूप से मजबूर
                                                                किया गया था (मौखिक
                                                                प्रश्नों, पूछताछ, सूचना या दस्तावेजों के लिए अनुरोध,
                                                                उप-नागरिक, या आपराधिक
                                                                जांच की मांग या इसी तरह की प्रक्रिया) या किसी भी
                                                                प्रकटीकरण के लिए एक नियामक
                                                                निकाय द्वारा आवश्यक है जो इस समझौते द्वारा निषिद्ध
                                                                या अन्यथा विवश है,
                                                            </li>
                                                            <li>
                                                                <ul type="none">
                                                                    <li>a. कंपनी को ऐसे किसी भी अनुरोध (नों) की
                                                                        त्वरित सूचना प्रदान करें
                                                                        ताकि कंपनी एक उचित सुरक्षात्मक आदेश या अन्य
                                                                        उचित उपाय और खोज सके
                                                                    </li>
                                                                    <li>b. इस तरह के किसी भी सुरक्षात्मक आदेश को
                                                                        प्राप्त करने में कंपनी को
                                                                        उचित सहायता प्रदान करें। यदि इस तरह के
                                                                        सुरक्षात्मक आदेश या अन्य उपाय
                                                                        प्राप्त नहीं किए जाते हैं या कंपनी एक छूट
                                                                        प्रदान करती है, तो मैं
                                                                        गोपनीय जानकारी के उस हिस्से (और केवल उस
                                                                        हिस्से) को प्रस्तुत कर सकता
                                                                        हूं, जो कंपनी को उचित रूप से स्वीकार्य वकील
                                                                        की लिखित राय में है, मैं
                                                                        हूं। कानूनी रूप से मजबूर या अन्यथा प्रकट
                                                                        करने के लिए आवश्यक है;
                                                                        बशर्ते, मैं विश्वसनीय आश्वासन प्राप्त करने
                                                                        के लिए उचित प्रयासों का
                                                                        उपयोग करूंगा, ताकि गोपनीयता का खुलासा किया
                                                                        गया कोई भी गोपनीय जानकारी
                                                                        प्राप्त हो सके</li>
                                                                </ul>

                                                            </li>
                                                        </ul>

                                                        <p>2. <b><u>Former Employment Information </u></b> - I agree
                                                            during my employment
                                                            with the Company, not to improperly use or disclose any
                                                            proprietary information
                                                            or trade secrets of any former or concurrent employer or
                                                            other person or entity
                                                            and not bring onto the premises of the Company any
                                                            unpublished document or
                                                            proprietary information belonging to any such employer,
                                                            person or entity unless
                                                            consented to in writing by such employer, person or
                                                            entity.</b>
                                                        </p>

                                                        <p>3. <b><u>पूर्व रोजगार सूचना </u></b> - मैं कंपनी के साथ
                                                            अपने रोजगार के दौरान सहमत
                                                            हूं, किसी पूर्व या समवर्ती नियोक्ता या अन्य व्यक्ति या
                                                            इकाई के किसी भी मालिकाना
                                                            जानकारी या व्यापार रहस्यों का अनुचित रूप से उपयोग या
                                                            खुलासा करने के लिए नहीं और
                                                            कंपनी के परिसर में किसी भी अप्रकाशित दस्तावेज़ या
                                                            स्वामित्व को नहीं लाना। ऐसे
                                                            किसी भी नियोक्ता, व्यक्ति या इकाई से संबंधित जानकारी जब
                                                            तक कि ऐसे नियोक्ता,
                                                            व्यक्ति या संस्था द्वारा लिखित रूप में सहमति नहीं दी
                                                            जाती है।</b>
                                                        </p>

                                                        <p>4. <b><u>Third Party Information </u></b> - I recognize
                                                            that the Company has
                                                            received and in the future will receive from third
                                                            parties their confidential or
                                                            proprietary information to use it only for certain
                                                            limited purposes. I agree to
                                                            hold all such confidential or proprietary information in
                                                            the strictest
                                                            confidence and not to disclose it to any person, firm or
                                                            corporation or to use
                                                            it except as necessary in carrying out my work for the
                                                            Company consistent with
                                                            the Company’s agreement with such third party.</b>
                                                        </p>


                                                        <p>5. <b><u>थर्ड पार्टी इंफॉर्मेशन </u></b> - मैं मानता हूं
                                                            कि कंपनी को प्राप्त हुआ
                                                            है और भविष्य में तीसरे पक्षों से प्राप्त होगा उनकी
                                                            गोपनीय या मालिकाना जानकारी
                                                            केवल कुछ सीमित उद्देश्यों के लिए इसका उपयोग करने के लिए।
                                                            मैं इस तरह की सभी
                                                            गोपनीय या मालिकाना जानकारी को कड़े विश्वास में रखने के
                                                            लिए सहमत हूं और किसी भी
                                                            व्यक्ति, फर्म या निगम को इसका खुलासा नहीं करने या कंपनी
                                                            के लिए कंपनी के समझौते
                                                            के अनुरूप मेरे काम को पूरा करने के लिए आवश्यक के अलावा
                                                            इसका उपयोग करने के लिए
                                                            सहमत हूं।</b>
                                                        </p>


                                                        <h3>2. RETURN OF PROPERTY</h3>
                                                        <p>Upon termination of my employment, I will return to the
                                                            Company, retaining no
                                                            copies or notes, all documents relating to the Company’s
                                                            business including, but
                                                            not limited to, reports, abstracts, lists,
                                                            correspondence, information, computer
                                                            files, computer disks, and all other materials and all
                                                            copies of such material,
                                                            obtained by me during my employment with the Company.
                                                        </p>

                                                        <h3>संपत्ति का पुनर्गठन</h3>
                                                        <p>अपने रोजगार को समाप्त करने पर, मैं कंपनी में वापस आऊंगा,
                                                            कोई प्रतियां या नोट नहीं
                                                            रखूंगा, कंपनी के व्यवसाय से संबंधित सभी दस्तावेज, लेकिन
                                                            रिपोर्ट, सार, सूचियों,
                                                            पत्राचार, सूचना, कंप्यूटर फ़ाइलों, कंप्यूटर डिस्क और
                                                            अन्य सभी सामग्री और इस तरह
                                                            की सामग्री की सभी प्रतियां, कंपनी के साथ मेरे रोजगार के
                                                            दौरान मेरे द्वारा
                                                            प्राप्त की गई हैं।</p>

                                                        <h3>3. LEGAL AND EQUITABLE REMEDIES</h3>
                                                        <p>I recognize that the Company may be irreparably damaged
                                                            by any breach of this
                                                            Agreement and that the Company shall be entitled to seek
                                                            an injunction, specific
                                                            performance or other equitable remedy to prevent such
                                                            competition or disclosure,
                                                            and may entitle the Company to other legal remedies,
                                                            including attorney’s fees
                                                            and costs.</p>
                                                        <h3>3. कानूनी और योग्य उपाय</h3>
                                                        <p>मैं मानता हूं कि कंपनी इस समझौते के किसी भी उल्लंघन से
                                                            अपूरणीय रूप से क्षतिग्रस्त
                                                            हो सकती है और कंपनी इस तरह की प्रतियोगिता या प्रकटीकरण
                                                            को रोकने के लिए
                                                            निषेधाज्ञा, विशिष्ट प्रदर्शन या अन्य न्यायसंगत उपाय
                                                            खोजने की हकदार होगी और कंपनी
                                                            को अन्य कानूनी उपायों का अधिकार दे सकती है। वकील की फीस
                                                            और लागत सहित।</p>



                                                        <h3>4. SUCCESORS AND ASSIGNS</h3>
                                                        <p>This Agreement will be binding upon my heirs, executors,
                                                            administrators and other
                                                            legal representatives and will be for the benefit of the
                                                            Company, its
                                                            successors, and its assigns. I may not assign any of my
                                                            rights, or delegate any
                                                            of my obligations, under this Agreement.</p>
                                                        <h3>4. उत्तराधिकारी</h3>
                                                        <p>यह समझौता मेरे उत्तराधिकारियों, निष्पादकों, प्रशासकों और
                                                            अन्य कानूनी प्रतिनिधियों
                                                            के लिए बाध्यकारी होगा और कंपनी, इसके उत्तराधिकारियों और
                                                            इसके कार्य के लाभ के लिए
                                                            होगा। मैं इस समझौते के तहत अपने किसी भी अधिकार को सौंप
                                                            नहीं सकता हूं, या अपने
                                                            किसी भी दायित्व को सौंप सकता हूं।</p>


                                                        <h3>5. CONTINUING OBLIGATIONS</h3>
                                                        <p>The obligations and rights described in this Agreement
                                                            shall survive the
                                                            termination of my employment with the Company.</p>
                                                        <h3>5. संपर्क सामग्री</h3>
                                                        <p>इस समझौते में वर्णित दायित्वों और अधिकारों को कंपनी के
                                                            साथ मेरे रोजगार की समाप्ति
                                                            से बचाना होगा।</p>

                                                        <h3>6. SEVERABILITY</h3>
                                                        <p>Whenever possible, each provision of this Agreement will
                                                            be interpreted in such
                                                            manner as to be effective and valid under applicable
                                                            law, but if any provision
                                                            of this Agreement is held to be invalid, illegal or
                                                            unenforceable in any respect
                                                            under any applicable law or rule in any jurisdiction,
                                                            such invalidity,
                                                            illegality or unenforceability will not affect any other
                                                            provision or any other
                                                            jurisdiction, but this agreement will be reformed,
                                                            construed and enforced in
                                                            such jurisdiction as if such invalid, illegal or
                                                            unenforceable provisions had
                                                            never been contained herein.</p>
                                                        <h3>6. स्थिरता</h3>
                                                        <p>जब भी संभव हो, इस समझौते के प्रत्येक प्रावधान की व्याख्या
                                                            इस प्रकार की जाएगी, जो
                                                            लागू कानून के तहत प्रभावी और मान्य हो, लेकिन यदि इस
                                                            समझौते के किसी भी प्रावधान
                                                            को किसी भी लागू कानून या नियम के तहत किसी भी संबंध में
                                                            अमान्य, अवैध या अप्राप्य
                                                            माना जाता है। किसी भी क्षेत्राधिकार, इस तरह की अमान्यता,
                                                            अवैधता या अनियंत्रितता
                                                            किसी अन्य प्रावधान या किसी अन्य क्षेत्राधिकार को
                                                            प्रभावित नहीं करेगी, लेकिन इस
                                                            समझौते को ऐसे अधिकार क्षेत्र में सुधार, मान लिया जाएगा
                                                            और लागू किया जाएगा जैसे
                                                            कि यह अवैध, अवैध या अप्रवर्तनीय प्रावधान कभी भी यहां
                                                            निहित नहीं थे।</p>



                                                        <h3>7. GOVERNING LAW</h3>
                                                        <p>This Agreement shall be governed by the laws of the state
                                                            of Tamil Nadu without
                                                            regard to its conflicts of law provisions. </p>
                                                        <h3>7. लौटना</h3>
                                                        <p>यह समझौता कानून के प्रावधानों के टकराव के बिना तमिलनाडु
                                                            राज्य के कानूनों द्वारा
                                                            शासित होगा।
                                                            विटनेस में, नीचे दिए गए पक्ष इस समझौते को
                                                            ___________________________ पर
                                                            निष्पादित करते हैं।
                                                            स्वीकार किए जाते हैं और स्वीकार किए जाते हैं </p>


                                                        <p>IN WITNESS WHEREOF, the parties below hereby execute this
                                                            Agreement on
                                                            ____________________.</p>


                                                        <p style="text-align:left;">Accepted and Acknowledged<span
                                                                style="float:right;">BRITANNIA LABELS INDIA PVT
                                                                LTD</span></p>
                                                        <p style="text-align:left;">Employee's
                                                            name/signature<br />कर्मचारी का नाम /
                                                            हस्ताक्षर हस्ताक्षरकर्ता<span
                                                                style="float:right;">Signatory</span></p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpAgreementHindiDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Agreement
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeeagreemantpathhindi}}"
                                        ng-hide="Employeeagreemantpathhindi == null || Employeeagreemantpathhindi == '' "
                                        ng-show="Employeeagreemantpathhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade emp-modal" id="ModalCenter1EmpTrainingTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    தொழிலாளர்களின் பயிற்சி குறித்த விபரம்
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Training
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpTrainingTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpTrainingTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpTrainingTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpTrainingTamil" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpTrainigTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>தொழிலாளர்களின் பயிற்சி குறித்த விபரம்</h4>
                                                        </center>



                                                        <p>பெயர் : {{Title}} {{Firstname}} {{Lastname}}</p>
                                                        <p>தொழிலாளர் எண் : {{Employeeid}}</p>
                                                        <p>பிரிவு : {{EmpDepartment}}</p>
                                                        <p>பணியில் சேர்ந்த நாள் : {{Date_Of_Joing2}} </p>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>S.No / வ.எண்</td>

                                                                    <td>PPE பயன்பாடு / விழிப்புணர்வு</td>

                                                                    <td>பயிற்சி வகை & தேதி</td>

                                                                    <td>பயிற்சி அளித்தவர் விபரம்</td>

                                                                    <td>பயிற்சி பெற்றவர் கையொப்பம்</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>நிர்வாக கொள்கை, வேலை நேரம், பணியமர்த்தும்
                                                                        கோட்பாடுகள் குறித்த விளக்க
                                                                        பயிற்சி</td>
                                                                    <td>
                                                                        In House Training on
                                                                        ______________
                                                                    </td>
                                                                    <td>(HR -Dept)
                                                                        ______________
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>கொடுப்பனர்களின் கொள்கை மற்றும் கோட்பாடுகள்
                                                                        பற்றிய விளக்க பயிற்சி
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="4">3

                                                                    </td>
                                                                    <td>பாதுகாப்பு விழிப்புணர்வு பயிற்சி<br />a.
                                                                        முதலுதவி பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>b. அவசரகாலத்தில் வெளியேறும் பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>c. தீயனைப்பான்கள் இயக்கப் பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>d. அவசர காலத்தில் தொடர்பு கொள்ள வேண்டிய
                                                                        எண்கள்</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>தனிநபர் பாதுகாப்பு சாதனங்கள் உபயோகிக்க
                                                                        பயிற்சி மற்றும் விழிப்புணர்வு
                                                                        குறித்த பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>பொது சுகாதாரம் மற்றும் சுற்றுப்புற தூய்மை
                                                                        குறித்த பயிற்சி</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpTrainingTamilDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Training
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeetrainingpathtamil}}"
                                        ng-hide="Employeetrainingpathtamil == null || Employeetrainingpathtamil == '' "
                                        ng-show="Employeetrainingpathtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade emp-modal" id="ModalCenter1EmpTrainingHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employees Training Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Training
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpTrainingHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpTrainingHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpTrainingHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpTrainingHindi" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExporEmpTrainigHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Employees Training Details / श्रमिकों के प्रशिक्षण
                                                                का विवरण</h4>
                                                        </center>



                                                        <p>NAME OF EMPLOYEE / कामगार का नाम :
                                                            {{Title}}{{Firstname}} {{Lastname}} </p>
                                                        <p>EMPLOYEE NO / श्रम संख्या : {{Employeeid}} </p>
                                                        <p>DEPARTMENT / अनुभाग : {{EmpDepartment}} </p>
                                                        <p>DATE OF JOINING / काम पर दिन : {{Date_Of_Joing2}}</p>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>S.No / नहीं</td>

                                                                    <td>Training Details
                                                                        प्रशिक्षण का विवरण
                                                                    </td>

                                                                    <td>Training Type(Internal/ External) & Date
                                                                        प्रशिक्षण प्रकार & दिनांक
                                                                    </td>

                                                                    <td>Trainer Details
                                                                        प्रशिक्षु प्रोफ़ाइल
                                                                    </td>

                                                                    <td>Trainee Signature
                                                                        प्रशिक्षु हस्ताक्षर
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Training - for Company Policies, Working
                                                                        Hours, Terms & Conditions
                                                                        of appointment प्रशासनिक नीति, समय और
                                                                        प्लेसमेंट सिद्धांतों पर
                                                                        प्रशिक्षण</td>
                                                                    <td>
                                                                        In House Training on
                                                                        ______________
                                                                    </td>
                                                                    <td>(HR -Dept)
                                                                        ______________
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Awareness on Buyer's Code of conduct and
                                                                        Ethics. भुगतान की नीति और
                                                                        सिद्धांतों की व्याख्या करने के लिए प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="4">3

                                                                    </td>
                                                                    <td>Safety Awareness<br />
                                                                        सुरक्षा जागरूकता प्रशिक्षण
                                                                        a. First Aid Training/
                                                                        प्राथमिक चिकित्सा प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>b. Emergency Evacuation Drill / आपातकाल में
                                                                        प्रशिक्षण से बाहर निकलें
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>c. Fire Extinguisher Operation Training /
                                                                        अग्निशामकों का प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>d. Use of Emergency Contact Numbers / आपात
                                                                        स्थिति के दौरान संपर्क
                                                                        किए जाने वाले नंबर</td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>PPE Usage / Awareness
                                                                        व्यक्तिगत सुरक्षात्मक उपकरणों पर प्रशिक्षण
                                                                        और जागरूकता प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Training on general Health &
                                                                        House Keeping
                                                                        सार्वजनिक स्वास्थ्य और पर्यावरण स्वच्छता पर
                                                                        प्रशिक्षण
                                                                    </td>
                                                                    <td>“</td>
                                                                    <td>“</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpTrainingHindiDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Training
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employeetrainingpathhindi}}"
                                        ng-hide="Employeetrainingpathhindi == null || Employeetrainingpathhindi == '' "
                                        ng-show="Employeetrainingpathhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenter1EmpServiceTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    வேலை / சிறப்பு அம்சம் குறித்த பதிவு
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Service Improvement Record
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpServiceTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpServiceTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpServiceTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpServiceTamil" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpServiceTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>வேலை / சிறப்பு அம்சம் குறித்த பதிவு</h4>
                                                        </center>



                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>

                                                        <p>பெயர் : {{Title}}{{Firstname}} {{Lastname}}</p>
                                                        <p>தொழிலாளர் எண் : {{Employeeid}}</p>
                                                        <p>பணியில் சேர்ந்த நாள் : {{Date_Of_Joing2}}</p>
                                                        <p>பிரிவு : {{EmpDepartment}}</p>
                                                        <p>பதவி : {{EmpDesignation}}</p>
                                                        <p>சம்பளம் : {{Gross_Salary|currency:''}}</p>




                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>SL.NO / வ.எண். </td>
                                                                    <td>DESCRIPTION / சிறப்பு அம்சம்</td>
                                                                    <td>INCREMENT / சம்பள உயர்வு</td>
                                                                    <td>DATE / நாள் </td>
                                                                    <td>AUTHORIZED BY / நிர்வாகி</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;"><span
                                                                style="float:right;">Authorized Signature</span>
                                                        </p>
                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpServiceTamilDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Serviceimprovementpathrecordtamil}}"
                                        ng-hide="Serviceimprovementpathrecordtamil == null || Serviceimprovementpathrecordtamil == '' "
                                        ng-show="Serviceimprovementpathrecordtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenter1EmpServiceHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record / काम/विशेष सुविधा के लिए साइन
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Employee Service Improvement Record
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpServiceHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpServiceHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpServiceHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpServiceHindi" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpServiceHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>Service Improvement Record / काम/विशेष सुविधा के लिए
                                                                साइन</h4>
                                                        </center>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                            width: 100%;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <p>NAME / नाम: {{Title}} {{Firstname}} {{Lastname}}</p>
                                                        <p>EMPLOYEE NO / श्रम संख्या: {{Employeeid}}</p>
                                                        <p>DATE OF JOINING / काम पर दिन: {{Date_Of_Joing2}} </p>
                                                        <p>DEPARTMENT / अनुभाग: {{EmpDepartment}}</p>
                                                        <p>DESIGNATION / संवर्धन: {{EmpDesignation}}</p>
                                                        <p>WAGES / वेतन: {{Gross_Salary|currency:''}}</p>



                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>SL.NO <br /> नहीं.
                                                                    </td>
                                                                    <td>DESCRIPTION<br />
                                                                        विशेष सुविधा
                                                                    </td>
                                                                    <td>INCREMENT<br />
                                                                        वेतन वृद्धि
                                                                    </td>
                                                                    <td>DATE<br />
                                                                        दिन
                                                                    </td>
                                                                    <td>AUTHORIZED BY<br />
                                                                        व्यवस्थापक
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:left;"><span
                                                                style="float:right;">Authorized Signature</span>
                                                        </p>


                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpServiceHindiDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Service Improvement Record
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Serviceimprovementpathrecordlhindi}}"
                                        ng-hide="Serviceimprovementpathrecordlhindi == null || Serviceimprovementpathrecordlhindi == '' "
                                        ng-show="Serviceimprovementpathrecordlhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade emp-modal" id="ModalCenter1EmpForm2RevisedTamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    படிவம்-2(திருத்தியது)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Form-2 Revised
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpForm2RevisedTamil" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpForm2RevisedTamil" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpForm2RevisedTamilDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpForm2RevisedTamil"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpForm2RevisedTamil">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        @media print {
                                                            @page {
                                                                margin: 10;
                                                            }

                                                            #btnEmpForm2RevisedTamil {
                                                                display: none;
                                                                ;
                                                            }

                                                        }
                                                        </style>

                                                        <center>
                                                            <h2>FORM-2(REVISED)/படிவம்-2(திருத்தியது)</h2>
                                                        </center>

                                                        <p>N0MINATION AND DECLARATION FORM/நியமனம் மற்றும்
                                                            உறுதிமொழிப்படிவம்</p>
                                                        <p>FOR UNEXEMPTED/EXEMPTED ESTABLISHMENTS/( விதிவிலக்கு
                                                            பெறாத/பெற்ற நிறுவனங்களுக்கு)</p>
                                                        <p>Declaration and Nomination Form Under the Employees'
                                                            Provident Funds & Employees'
                                                            Pension Scheme/
                                                            (நியமனம் மற்றும் உறுதிமொழி)</p>
                                                        <p>(Paragraph 33 & 61(1) of the Employees' Provident Fund
                                                            Scheme , 1952 & Paragraph 18
                                                            of the Employees' Pension Scheme,1995)/(தொழிலாளர்
                                                            வருங்கால வைப்பு நிதித் திட்டம்
                                                            1952 பாரா 33 & 61 (1) ன் படியும் தொ.ஒ.திட்ட 1995 பாரா
                                                            18ன் படியும்)</p>

                                                        <table>
                                                            <tr>
                                                                <td>1. Name (in Block Letters)/ பெயர்(தனித் தனி
                                                                    எழுத்துக்களில்) </td>
                                                                <td>: {{Title}}{{Firstname}} {{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2. Father's / Husband's Name/(தந்தை/கணவர் பெயர்)
                                                                </td>
                                                                <td>: {{FatherGuardianSpouseName}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3. Date of Birth/(பிறந்த தேதி) </td>
                                                                <td>: {{Dob2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4. Sex/இனம் </td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5. Marital Status/(திருமணமானவரா/இல்லையா?) </td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6. Account No/(கணக்கு எண்) </td>
                                                                <td>: {{UANno}}

                                                                    <!-- {{Bankname}}
                                                                    <br />
                                                                    {{Accountno}}
                                                                    <br />
                                                                    {{IFSCcode}}
                                                                    <br />
                                                                    {{Branch}}
                                                                    <br /> -->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>7. Address/ முகவரி </td>
                                                                <td>:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Permanent/நிரந்தரம் </td>
                                                                <td>: {{PermanentAddress}}
                                                                    <br>
                                                                    {{PermanentCountry}}
                                                                    <br>
                                                                    {{PermanentState}}
                                                                    <br>
                                                                    {{PermanentCity}}
                                                                    <br>
                                                                    {{PermanentPincode}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temporary/தற்காலிகம் </td>
                                                                <td>: {{CurrentAddress}}
                                                                    <br>
                                                                    {{CurrentCountry}}
                                                                    <br>
                                                                    {{CurrentState}}
                                                                    <br>
                                                                    {{CurrentCity}}
                                                                    <br>
                                                                    {{CurrentPincode}}
                                                                </td>
                                                            </tr>
                                                        </table>


                                                        <center>
                                                            <h4>PART-A(EPF)/பிரிவு-அ(தொ.வை.நி)</h4>
                                                        </center>
                                                        <br />


                                                        <p><b>I hereby nominate the person (s)/cancel the nomination
                                                                made by previously and
                                                                nominate the person (s) mentioned below to receive
                                                                the amount standing to my
                                                                credit in the Employees' Provident Fund, in the
                                                                event of my death</b></p>
                                                        <p>என் இறப்புக்கு பின்னால் என் கணக்கில் உள்ள வைப்பு நிதித்
                                                            தொகையைப் பெற்றிடக்
                                                            கீழ்க்காணும் நபர்களை நியமிக்கிறேன்</p>
                                                        Name & Address of the nominee/Nominee’s Nominee's
                                                        relationship with the member Date of
                                                        Birth/ Age Total amount or Share of accumulations in
                                                        Provident Fund to be Paid to each
                                                        nominee If the Nominee is a minor, name and relationship &
                                                        address of the guardian who
                                                        may receive the amount during the minority of nominee</p>
                                                        </br>
                                                        <table class="doc-table" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <td>S.no</td>
                                                                    <td>Name & Address of the nominee/Nominee’s</td>
                                                                    <td>Nominee's relationship with the member</td>
                                                                    <td>Date of Birth/ Age</td>
                                                                    <td>Total amount or Share of accumulations in
                                                                        Provident Fund to be Paid to
                                                                        each nominee</td>
                                                                    <td>If the Nominee is a minor, name and
                                                                        relationship & address of the
                                                                        guardian who may receive the amount during
                                                                        the minority of nominee</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr dir-paginate="e in GetNomineeList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Nomineegrid"
                                                                    current-page="currentPageNominee">
                                                                    <td style="width: 50px;">
                                                                        {{$index+1 + (currentPageNominee - 1) * pageSizeNominee}}
                                                                    </td>
                                                                    <td>{{e.NomineeName}}
                                                                        <br />
                                                                        {{e.NomineeAddress}}
                                                                    </td>
                                                                    <td>{{e.NomineeRelationship}}</td>
                                                                    <td>{{e.NomineeDateOfBirth2 }} / {{e.NomineeAge}}
                                                                    </td>

                                                                    <td>{{e.PercentageofShare  | currency:''}}</td>
                                                                    <td>{{e.Guardianname}}</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                        <p>1.* Certified that I have no family as defined para 2 (g)
                                                            of the Employees' Provident
                                                            Fund Scheme 1956 and should I acquire a family hereafter
                                                            the above nomination should
                                                            be deemed as cancelled</p>
                                                        <p>2.*Certified that my father /mother is /are dependent
                                                            upon me. /என்னுடைய தந்தை / தாய்
                                                            என்னைச் சார்ந்தே இருக்கிறார்கள் என்றும் சான்று
                                                            அளிக்கிறேன்.</p>

                                                        <br /><br /><br />
                                                        <p> <span style="float:right;">Signature or thumb impression of
                                                                the subscriber
                                                                /</span><br /> <span
                                                                style="float:right;">உறுப்பினரின்கையொப்பம்(அ) இடது
                                                                கை பெருவிரல் ரேகை</span></p>
                                                        <br /><br /><br />

                                                        <p><b>
                                                                <center>CERTIFICATION BY EMPLOYER/(நிறுவன உரிமையாளரின்
                                                                    சான்று)</center>
                                                            </b></p>
                                                        <br />

                                                        <p>Certified that the above declaration and nomination has been
                                                            signed /thumb impressed before me by Shri/Smt/ Kum
                                                            {{Firstname}} {{Lastname}} employed in my establishment
                                                            after he /she has read the entires have
                                                            been read over to him /her by me and got confirmed by him
                                                            /her. </p>
                                                        <p>எனது நிறுவனத்தில் பணிபுரியும் திரு./திருமதி./செல்வி
                                                            {{Firstname}} {{Lastname}}
                                                            அவர்கள் விவரங்கள் அறிந்தும் / என்னால் விளக்கிக்
                                                            கூறப்பட்டும், பின் அதனால் பொருள் புரிந்து மேற்காணும்
                                                            உறுதிமொழி மற்றும் நியமனத்தில் கையொப்பம் / கைரேகை என்
                                                            முன்னால் இட்டுள்ளார் என்பதற்கு இதுவே சான்று. </p>
                                                        <br /><br /><br />
                                                        <p> <span style="float:right;">Signature of the Employer or
                                                                authorised officers of the establishment/</span><br />
                                                            <span style="float:right;">நிறுவன உரிமையாளரின்/நிறுவனத்தின்
                                                                அதிகாரம் பெற்றவரின் கையொப்பம் </span>
                                                            <br />
                                                            <span style="float:right;">Designation/பதவி :
                                                                {{EmpDesignation}} </span>
                                                        </p>
                                                        <br />
                                                        <p> <span style="float:left;">Place/இடம்:{{Place}} </span></p>
                                                        </br>


                                                        <p> <span style="float:right;">Name & Address of the factory /
                                                                Establishment or Rubber Stamp there on / </span><br />
                                                            <span style="float:right;">தொழிலகத்தின் / நிறுவனத்தின்
                                                                பெயரும் , முகவரியும் அல்லது முத்திரையும் </span>
                                                            <br />
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpForm2RevisedTamilDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM -2 REVISED
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form2revisedpathtamil}}"
                                        ng-hide="Form2revisedpathtamil == null || Form2revisedpathtamil == '' "
                                        ng-show="Form2revisedpathtamil != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade emp-modal" id="ModalCenter1EmpForm2RevisedHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM-2(REVISED)/ फॉर्म-2 (संशोधित)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> Form-2 Revised
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputEmpForm2RevisedHindi" name=files[]
                                                        accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonEmpForm2RevisedHindi" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpForm2RevisedHindiDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpForm2RevisedHindi"
                                                    class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportEmpForm2RevisedHindi">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <center>
                                                            <h4>FORM-2(REVISED)/ फॉर्म-2 (संशोधित)</h4>
                                                        </center>

                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        @media print {
                                                            @page {
                                                                margin: 10;
                                                            }

                                                            #btnEmpForm2RevisedHindi {
                                                                display: none;
                                                                ;
                                                            }

                                                        }
                                                        </style>

                                                        <p>N0MINATION AND DECLARATION FORM/ नामांकन और घोषणा प्रपत्र
                                                        </p>
                                                        <p>FOR UNEXEMPTED/EXEMPTED ESTABLISHMENTS/( बिना छूट/छूट
                                                            वाले प्रतिष्ठानों के लिए)
                                                        </p>
                                                        <p>Declaration and Nomination Form Under the Employees'
                                                            Provident Funds & Employees'
                                                            Pension Scheme/(नियुक्ति और शपथ)</p>
                                                        <p>(Paragraph 33 & 61(1) of the Employees' Provident Fund
                                                            Scheme , 1952 & Paragraph
                                                            18 of the Employees' Pension Scheme,1995)/( श्रम भविष्य
                                                            निधि योजना 1952 पैरा 33
                                                            और 61 (1) और टीओ </p>


                                                        और टीओ योजना 1995पैरा 18 . के अनुसार)
                                                        <table class="doc-table">
                                                            <tr>
                                                                <td>Name (in Block Letters)/ नाम (बड़े अक्षरों में)
                                                                </td>
                                                                <td>: {{Title}}{{Firstname}} {{Lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Father's / Husband's Name / पिता/पति का नाम</td>
                                                                <td>: {{FatherGuardianSpouseName}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date of Birth/( जन्म तिथि)</td>
                                                                <td>: {{Dob2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sex/ लिंग</td>
                                                                <td>: {{Gender}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Marital Status/( वैवाहिक स्थिति)</td>
                                                                <td>: {{Married}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Account No/( खाता संख्या)</td>



                                                                <td>: {{UANno}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address/ पता</td>
                                                                <td>:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Permanent/ स्थायी</td>
                                                                <td>: {{PermanentAddress}}
                                                                    <br>
                                                                    {{PermanentCountry}}
                                                                    <br>
                                                                    {{PermanentState}}
                                                                    <br>
                                                                    {{PermanentCity}}
                                                                    <br>
                                                                    {{PermanentPincode}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temporary/ अस्थायी</td>
                                                                <td>: {{CurrentAddress}}
                                                                    <br>
                                                                    {{CurrentCountry}}
                                                                    <br>
                                                                    {{CurrentState}}
                                                                    <br>
                                                                    {{CurrentCity}}
                                                                    <br>
                                                                    {{CurrentPincode}}
                                                                </td>
                                                            </tr>
                                                        </table>


                                                        <center>
                                                            <h4>PART-A(EPF)/ भाग-ए (ईपीएफ)</h4>
                                                        </center>



                                                        <p><b>I hereby nominate the person (s)/cancel the nomination
                                                                made by previously and
                                                                nominate the person (s) mentioned below to receive
                                                                the amount standing to my
                                                                credit in the Employees' Provident Fund, in the
                                                                event of my death</b></p>
                                                        <p>मैं एतद्द्वारा पूर्व में किए गए व्यक्ति
                                                            (व्यक्तियों)/नामांकन को रद्द करता/करती
                                                            हूं और मेरी मृत्यु की स्थिति में कर्मचारी भविष्य निधि
                                                            में मेरे खाते में जमा राशि
                                                            प्राप्त करने के लिए नीचे उल्लिखित व्यक्ति (व्यक्तियों)
                                                            को नामित करता हूं।.
                                                        </p>

                                                        <table class="doc-table">
                                                            <thead>
                                                                <tr>
                                                                    <td>S.No</td>
                                                                    <td>Name & Address of the nominee/Nominee’s
                                                                        नामिती/नामितियों का नाम और
                                                                        पता</td>
                                                                    <td>Nominee's relationship with the member
                                                                        नॉमिनी का सदस्य के साथ संबंध
                                                                    </td>
                                                                    <td>Date of Birth/ Age
                                                                        जन्म तिथि / आयु
                                                                    </td>
                                                                    <td>Total amount or Share of accumulations in
                                                                        Provident Fund to be Paid
                                                                        to each nominee
                                                                        प्रत्येक नामांकित व्यक्ति को भुगतान की जाने
                                                                        वाली भविष्य निधि में कुल
                                                                        राशि या संचय का हिस्सा
                                                                    </td>
                                                                    <td>If the Nominee is a minor, name and
                                                                        relationship & address of the
                                                                        guardian who may receive the amount during
                                                                        the minority of naminee
                                                                        यदि नामिती अवयस्क है, तो उस अभिभावक का नाम
                                                                        और संबंध और पता, जिसे
                                                                        नामिनी की अवयस्कता के दौरान राशि प्राप्त हो
                                                                        सकती है
                                                                    </td>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr dir-paginate="e in GetNomineeList |filter:searchFamily|itemsPerPage:10 "
                                                                    pagination-id="Nomineegrid"
                                                                    current-page="currentPageNominee">
                                                                    <td style="width: 50px;">
                                                                        {{$index+1 + (currentPageNominee - 1) * pageSizeNominee}}
                                                                    </td>
                                                                    <td>{{e.NomineeName}}
                                                                        <br />
                                                                        {{e.NomineeAddress}}
                                                                    </td>
                                                                    <td>{{e.NomineeRelationship}}</td>
                                                                    <td>{{e.NomineeDateOfBirth2}}/{{e.NomineeAge}}
                                                                    </td>
                                                                    <td>{{e.PercentageofShare  | currency:''}}</td>
                                                                    <td>{{e.Guardianname}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p>1.* Certified that I have no family as defined para 2 (g)
                                                            of the Employees'
                                                            Provident Fund Scheme 1956 and should I acquire a family
                                                            hereafter the above
                                                            nomination should be deemed as cancelled प्रमाणित किया
                                                            जाता है कि कर्मचारी
                                                            भविष्य निधि योजना 1956 के परिभाषित पैरा 2 (जी) के अनुसार
                                                            मेरा कोई परिवार नहीं है
                                                            और क्या मुझे इसके बाद एक परिवार का अधिग्रहण करना चाहिए,
                                                            उपरोक्त नामांकन को रद्द
                                                            माना जाना चाहिए।</p>
                                                        <p>2.*Certified that my father /mother is /are dependent
                                                            upon me. / प्रमाणित किया
                                                            जाता है कि मेरे पिता/माता मुझ पर आश्रित हैं/हैं</p>
                                                        <p>Strike out whichever is not applicable. जो लागू न हो उसे
                                                            काट दें।.</p>
                                                        <br /><br /><br />
                                                        <p> <span style="float:right;">Signature or thumb impression of
                                                                the subscriber /बाएं
                                                                अंगूठे के सदस्य (क) अंगूठे
                                                                का निशान के हस्ताक्षर। </span></p>

                                                        <br />
                                                        <p><b>
                                                                <center>CERTIFICATION BY EMPLOYER/(कंपनी के मालिक का
                                                                    सबूत) </center>
                                                            </b></p>
                                                        <br />

                                                        <p>Certified that the above declaration and nomination has been
                                                            signed /thumb impressed before me by Shri/Smt/ Kum
                                                            {{Firstname}} {{Lastname}} employed in my establishment
                                                            after he /she has read the entires have
                                                            been read over to him /her by me and got confirmed by him
                                                            /her. </p>
                                                        <p>Mr./Mrs./Ms. मेरी कंपनी में कार्य करना {{Firstname}}
                                                            {{Lastname}}
                                                            "यह इस बात का प्रमाण है कि उपर्युक्त प्रतिज्ञा और नामांकन
                                                            में मेरे समक्ष हस्ताक्षर/फिंगरप्रिंट रखा गया है, जिसे ब्यौरे
                                                            द्वारा समझा और समझाया गया है।

                                                            "

                                                            . </p>
                                                        <br /><br /><br />
                                                        <p> <span style="float:right;">Signature of the Employer or
                                                                authorised officers of the establishment/</span><br />
                                                            <span style="float:right;">कंपनी के मालिक/कंपनी के प्राधिकार
                                                                के हस्ताक्षर </span>
                                                            <br />
                                                            <span style="float:right;">Designation/பதவி :
                                                                {{EmpDesignation}} </span>
                                                        </p>
                                                        <br />
                                                        <p> <span style="float:left;">Place/अंतरिक्ष:{{Place}} </span></p>
                                                        </br>


                                                        <p> <span style="float:right;">Name & Address of the factory /
                                                                Establishment or Rubber Stamp there on / </span><br />
                                                            <span style="float:right;">सुविधा का नाम, पता या मुहर/
                                                            </span>
                                                            <br />
                                                        </p>

                                                    </div>



                                                </div>


                                            </div>










                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-rounded btn-dark" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterEmpForm2RevisedHindiDocumentView" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    FORM -2 REVISED
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Form2revisedpathhindi}}"
                                        ng-hide="Form2revisedpathhindi == null || Form2revisedpathhindi == '' "
                                        ng-show="Form2revisedpathhindi != null "
                                        style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade emp-modal" id="ModalCenterNDA" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    NDA
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> NDA
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputNDA" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonNDA" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterNDAEnglishDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpNDA" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportNDAEnglish">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />

                                                        <style>
                                                        .btn-nda-down {
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 15px;
                                                        }

                                                        p {
                                                            text-align: justify;
                                                        }

                                                        .div-table {
                                                            display: table;
                                                            width: 100%;
                                                        }

                                                        .div-table-row {
                                                            display: table-row;
                                                            width: 100%;
                                                            clear: both;
                                                        }

                                                        .div-table-col {
                                                            float: left;
                                                            /* fix for  buggy browsers */
                                                            width: 50%;
                                                            display: table-column;
                                                        }

                                                        h4 {
                                                            text-align: center;
                                                            font-weight: bold;
                                                        }

                                                        .nda-ta-content p,
                                                        .nda-ta-content ul li {
                                                            font-size: 15px;
                                                        }

                                                        .nda-ta-content p u {
                                                            font-weight: bold;
                                                        }
                                                        </style>


                                                        <div class='nda-ta-content'><br />
                                                            <h4>EMPLOYEE’S CONFIDENTIALITY & NON-DISCLOSURE
                                                                AGREEMENT</h4>

                                                            <p>FOR GOOD CONSIDERATION and in consideration of my
                                                                employment or continued
                                                                employment by {{Clientname}}
                                                                (the Company”), I, the
                                                                undersigned employee, hereby agree to the terms of
                                                                this agreement (the
                                                                “Agreement”): </p>


                                                            <p>1. <u>CONFIDENTIAL INFORMATION</u></p>

                                                            <p><u>a. Company Information</u> - I agree at all times
                                                                during the term of my
                                                                employment and for a period of three years
                                                                thereafter, to hold in strictest
                                                                confidence, and not to use, except for the benefit
                                                                of the Company, or to
                                                                disclose to any person, firm or corporation without
                                                                written authorization of
                                                                the Company, any Confidential Information of the
                                                                Company. I understand that
                                                                “Confidential Information” means any Company
                                                                proprietary information,
                                                                technical data, trade secrets or know-how,
                                                                including, but not limited to,
                                                                research, product plans, products, services,
                                                                customer lists, markets,
                                                                software, developments, inventions, processes,
                                                                formulas, technology,
                                                                designs, drawings, engineering, hardware
                                                                configuration information,
                                                                marketing, finances or other business information
                                                                disclosed to me by the
                                                                Company either directly or indirectly.</p>

                                                            <p><u>b. Exceptions</u> - The foregoing obligations and
                                                                restrictions do not
                                                                apply to that part of the Confidential Information
                                                                that I can demonstrate:
                                                            </p>
                                                            <ul style='list-style: none;'>
                                                                <li>i. was available or became generally available
                                                                    to the public; or </li>
                                                                <li>ii. was requested or legally compelled (by oral
                                                                    questions,
                                                                    interrogatories, requests for information or
                                                                    documents, subpoena, civil
                                                                    or criminal investigative demand or similar
                                                                    process) or is required by a
                                                                    regulatory body to make any disclosure which is
                                                                    prohibited or otherwise
                                                                    constrained by this Agreement, provided, that I
                                                                    shall</li>

                                                                <ul style='list-style: none;'>
                                                                    <li>a. provide the Company with prompt notice of
                                                                        any such request(s) so
                                                                        that the Company may seek an appropriate
                                                                        protective order or other
                                                                        appropriate remedy and </li>

                                                                    <li>b. Provide reasonable assistance to the
                                                                        Company in obtaining any
                                                                        such protective order. If such protective
                                                                        order or other remedy is
                                                                        not obtained or the Company grants a waiver
                                                                        hereunder, then I may
                                                                        furnish that portion (and only that portion)
                                                                        of the Confidential
                                                                        Information which, in the written opinion of
                                                                        counsel reasonably
                                                                        acceptable to the Company, I am legally
                                                                        compelled or am otherwise
                                                                        required to disclose; provided, that I shall
                                                                        use reasonable efforts
                                                                        to obtain reliable assurance that
                                                                        confidentiality be accorded any
                                                                        Confidential Information so disclosed.</li>
                                                                </ul>
                                                            </ul>
                                                            <p><u>c. Former Employment Information</u> - I agree
                                                                during my employment with
                                                                the Company, not to improperly use or disclose any
                                                                proprietary information
                                                                or trade secrets of any former or concurrent
                                                                employer or other person or
                                                                entity and not bring onto the premises of the
                                                                Company any unpublished
                                                                document or proprietary information belonging to any
                                                                such employer, person
                                                                or entity unless consented to in writing by such
                                                                employer, person or entity.
                                                            </p>
                                                            <p><u>d. Third Party Information</u> - I recognize that
                                                                the Company has received
                                                                and in the future will receive from third parties
                                                                their confidential or
                                                                proprietary information to use it only for certain
                                                                limited purposes. I agree
                                                                to hold all such confidential or proprietary
                                                                information in the strictest
                                                                confidence and not to disclose it to any person,
                                                                firm or corporation or to
                                                                use it except as necessary in carrying out my work
                                                                for the Company
                                                                consistent with the Company’s agreement with such
                                                                third party.</p>

                                                            <p>2. <u>RETURN OF PROPERTY</u></p>
                                                            <p>Upon termination of my employment, I will return to
                                                                the Company, retaining no
                                                                copies or notes, all documents relating to the
                                                                Company’s business including,
                                                                but not limited to, reports, abstracts, lists,
                                                                correspondence, information,
                                                                computer files, computer disks, and all other
                                                                materials and all copies of
                                                                such material, obtained by me during my employment
                                                                with the Company. </p>

                                                            <p>3. <u>LEGAL AND EQUITABLE REMEDIES</u></p>

                                                            <p>I recognize that the Company may be irreparably
                                                                damaged by any breach of this
                                                                Agreement and that the Company shall be entitled to
                                                                seek an injunction,
                                                                specific performance or other equitable remedy to
                                                                prevent such competition
                                                                or disclosure, and may entitle the Company to other
                                                                legal remedies,
                                                                including attorney’s fees and costs.</p>

                                                            <p>4. <u>SUCCESORS AND ASSIGNS</u></p>
                                                            <p>This Agreement will be binding upon my heirs,
                                                                executors, administrators and
                                                                other legal representatives and will be for the
                                                                benefit of the Company, its
                                                                successors, and its assigns. I may not assign any of
                                                                my rights, or delegate
                                                                any of my obligations, under this Agreement.</p>

                                                            <p>5. <u>CONTINUING OBLIGATIONS</u></p>
                                                            <p>The obligations and rights described in this
                                                                Agreement shall survive the
                                                                termination of my employment with the Company.</p>

                                                            <p>6. <u>SEVERABILITY</u></p>
                                                            <p>Whenever possible, each provision of this Agreement
                                                                will be interpreted in
                                                                such manner as to be effective and valid under
                                                                applicable law, but if any
                                                                provision of this Agreement is held to be invalid,
                                                                illegal or unenforceable
                                                                in any respect under any applicable law or rule in
                                                                any jurisdiction, such
                                                                invalidity, illegality or unenforceability will not
                                                                affect any other
                                                                provision or any other jurisdiction, but this
                                                                agreement will be reformed,
                                                                construed and enforced in such jurisdiction as if
                                                                such invalid, illegal or
                                                                unenforceable provisions had never been contained
                                                                herein.</p>

                                                            <p>7. <u>GOVERNING LAW</u></p>
                                                            <p>This Agreement shall be governed by the laws of the
                                                                state of Tamil Nadu
                                                                without regard to its conflicts of law provisions.
                                                            </p>


                                                            <p>IN WITNESS WHEREOF, the parties below hereby execute
                                                                this Agreement on
                                                                ___________________________.</p>

                                                            <div class='div-table'>
                                                                <div class='div-table-row'>
                                                                    <br /><br />
                                                                    <div class='div-table-col'>
                                                                        <p>Accepted and
                                                                            Acknowledged<br /><br /><br /><br />Employee’s
                                                                            name/signature</p>
                                                                    </div>
                                                                    <div class='div-table-col'>
                                                                        <p>Britannia Garment Packaging Pvt
                                                                            Ltd.,<br /><br /><br /><br />Authorized
                                                                            Signatory</p>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        </div>



                                                    </div>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenterNDAEnglishDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    NDA
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employee_NDA_Path}}"
                                        ng-hide="Employee_NDA_Path == null || Employee_NDA_Path == '' "
                                        ng-show="Employee_NDA_Path != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>





                <div class="modal fade emp-modal" id="ModalCenterGRATUITY" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    GRATUITY
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label class="col-form-label"> GRATUITY
                                                </label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" ng-model="clearinput"
                                                        id="fileInputGratuity" name=files[] accept="application/pdf">
                                                    <div class="input-group-append">
                                                        <p id="fileButtonGratuity" class="input-group-text">
                                                            <i class="fa fa-upload"></i>
                                                        </p>
                                                        <p class="input-group-text"
                                                            ng-click="FetchSIPLDocument(Employeeid);"
                                                            data-toggle="modal"
                                                            data-target="#ModalCenterEmpGratuityDocumentView">
                                                            <i class="fa fa-file"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpGratuity" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportGratuity">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}}{{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <center>
                                                            <h4>GRATUITY</h4>
                                                        </center>


                                                        <style type="text/css">
                                                        table.doc-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                        }

                                                        table.doc-table td,
                                                        table.doc-table th {
                                                            border: 1px solid #000000;
                                                            text-align: left;
                                                            padding: 8px;
                                                        }

                                                        table.bold-table {
                                                            border-collapse: collapse;
                                                            margin: 20px 0;
                                                            width: 100%;
                                                            font-weight: bold;
                                                        }

                                                        table.bold-table td,
                                                        table.bold-table th {
                                                            border: 1px solid #000000;
                                                            text-align: center;
                                                            padding: 8px;
                                                        }
                                                        </style>


                                                        <table class="bold-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>FORM F</td>
                                                                    <td>See sub-rule(1) of Rule 6 of the Tamil Nadu
                                                                        Payment of Gratuity Rules,1973</td>
                                                                    <td>NOMINATION</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <p><b>To;<br />
                                                                The General Manager,BLIPL,{{ClientAddressLine1}}
                                                                {{ClientAddressLine2}} <br />
                                                                {{ClientAddressLine3}},<br />
                                                                {{ClientCity}}-{{ClientZipcode}}.</b>
                                                        </p>


                                                        <p>1. Thiru / Tirumathi/ Selvi
                                                            <u>{{Title}}{{Firstname}} {{Lastname}}</u> (Name
                                                            in full here) Whose particulars are given in the
                                                            statement below, hereby nominate the person(s) mentioned
                                                            below to receive the gratuity payable after my death as
                                                            also the gratuity standing to my credit in the event of
                                                            my death before that amount has become payable, or
                                                            having become payable has not been paid and direct that
                                                            the said amount of gratuity shall be paid in proportion
                                                            indicated against the name(s) of the nominee(s).
                                                        </p>

                                                        <p>2. I hereby certify that the person(s) mentioned is a /
                                                            are member(s) of my family within the meaning of clause
                                                            (h) of section 2 of the Payment of Gratuity Act, 1972.
                                                        </p>

                                                        <p>3. I hereby declare that I have no family within the
                                                            meaning of clause(h) of section 2 of the said Act.</p>

                                                        <p>4. (a) My father / mother / parents is / are not
                                                            dependent on my husband.<br />
                                                            (b) My husband'sfather / mother / parents is / are not
                                                            dependent on my husband.</p>

                                                        <p>5. I have excluded my husband from my family by a notice
                                                            dated the ....................... to the controlling
                                                            Authority in terms of the proviso to clause (h) of 2 of
                                                            the said Act.section</p>

                                                        <p>6. Nomination made herein invalidates my pervious
                                                            nomination.</p>


                                                        <table class="doc-table">

                                                            <tr>
                                                                <td>S.No</td>
                                                                <td>NAME IN FULL WITH FULL ADDRESS OF
                                                                    NOMINEES(S)
                                                                </td>
                                                                <td>Relationship with the employee
                                                                </td>
                                                                <td>Age of nominee
                                                                </td>
                                                                <td>Proportion by which gratuity will be shared
                                                                </td>
                                                            </tr>
                                                            <tbody>
                                                                <tr dir-paginate="e in GetNomineeList |filter:searchFamily|itemsPerPage:n "
                                                                    pagination-id="Nomineegrid"
                                                                    current-page="currentPageNominee">
                                                                    <td style="width: 50px;">
                                                                        {{$index+1 + (currentPageNominee - 1) * pageSizeNominee}}
                                                                    </td>
                                                                    <td>{{e.NomineeName}}
                                                                        <br />
                                                                        {{e.NomineeAddress}}
                                                                    </td>
                                                                    <td>{{e.NomineeRelationship}}</td>
                                                                    <td>{{e.NomineeAge}}
                                                                    </td>
                                                                    <td>{{PercentageofShare  | currency:''}}</td>

                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table style="width: 100%;">
                                                            <tbody>


                                                                <tr>
                                                                    <td>1. Name of the employee in
                                                                        full:{{Title}}{{Firstname}} {{Lastname}}</td>
                                                                    <td>2. Sex:{{Gender}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.Whether unmarried/married/widow widower:{{Married}}
                                                                    </td>
                                                                    <td>4. Department / Branch:{{EmpDepartment}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5. Post held with Ticket No. or Serial No.
                                                                        if any:{{Employeeid}}</td>
                                                                    <td>6. Date of appointment:{{Date_Of_Joing2}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7. Permanent
                                                                        Address:<br /> {{PermanentAddress}}
                                                                        <br>
                                                                        {{PermanentCountry}}
                                                                        <br>
                                                                        {{PermanentState}}
                                                                        <br>
                                                                        {{PermanentCity}}
                                                                        <br>
                                                                        {{PermanentPincode}}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p>Place/ स्थान:{{Place}}</p>
                                                        <p>Date/ दिनांक:{{Date_Of_Joing2}}</p>
                                                        <p style="float:right"> Signature / Thumb- impression of
                                                            employee</p>
                                                        <br /><br /><br /><br /><br /><br />

                                                        <center>
                                                            <h3>DECLARATION BY WITNESSES</h3>
                                                        </center>

                                                        <center>
                                                            <p>Nomination signed/ thumb - impresses before me</p>
                                                        </center>


                                                        <table class="doc-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td> NAME IN FULL AND FULL ADDRESS OF WITNESSES

                                                                    </td>
                                                                    <td>Signature of Witnesses
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>

                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>

                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                        <center>
                                                            <h3>CERTIFICATE BY THE EMPLOYER
                                                            </h3>
                                                        </center>

                                                        <center>
                                                            <p>Certified that the particulars of the above
                                                                nomination have been verified and recorded in this
                                                                establishment</p>
                                                        </center>


                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table class="doc-table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Gabrial Alvish
                                                                                        Tirkey<br /><br /><br /><br /><br />
                                                                                    </td>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        <table class="doc-table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Name and address of the
                                                                                        establishment or rubber-
                                                                                        stamp
                                                                                        thereof<br /><br /><br /><br /><br />
                                                                                    </td>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br />
                                                        <p style="float:right">Signature of the employer / Officer
                                                            authorized</p>
                                                        <br /><br />

                                                        <center>
                                                            <h3>ACKNOWLEDGEMENT BY THE EMPLOYEE</h3>
                                                        </center>
                                                        <center>
                                                            <p>Received the duplicate copy of nomination in Form 'F'
                                                                filed by me and duly certified by the employer</p>
                                                        </center>

                                                        <table cellpadding="10" width="100%">
                                                            <tr>
                                                                <td width="33%">Date :{{Date_Of_Joing2}}</td>
                                                                <td style="border:1px solid #000000" align="center">
                                                                    NOTE: Strike out the words / Paragraphs not
                                                                    applicable</td>
                                                                <td align="center" width="33%">Signature of the
                                                                    employee</td>
                                                            </tr>
                                                        </table>





                                                    </div>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade emp-modal" id="ModalCenterNDAEnglishDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    NDA
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Employee_NDA_Path}}"
                                        ng-hide="Employee_NDA_Path == null || Employee_NDA_Path == '' "
                                        ng-show="Employee_NDA_Path != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>






                <div class="modal fade emp-modal" id="ModalCenterEmpGratuityDocumentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    GRATUITY
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{GratutityPath}}"
                                        ng-hide="GratutityPath == null || GratutityPath == '' "
                                        ng-show="GratutityPath != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="modal fade emp-modal" id="ModalCenter1EmpFormAssessment" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Performance Assessment
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="form-group col-md-8">


                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="col-form-label">
                                                </label>
                                                <a id="btnEmpAssessment" class="btn btn-info btn-sm btn-nda-down2"><i
                                                        class="fa fa-download"></i>
                                                    Download</a>
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div id="pdfExportPerformanceAssessment">

                                                <div class="pdf-sipl">
                                                    <div class="pdf-header-sipl-modal">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <hr />
                                                        <center>
                                                            <h4>Performance Assessment</h4>
                                                        </center>


                                                        <style>
                                                        .psa p {
                                                            margin: 0px;
                                                        }

                                                        .psa table {
                                                            border-collapse: collapse;
                                                            margin-bottom: 10px;
                                                            font-size: 0.9rem;
                                                            min-width: 700px;
                                                            max-width: 700px
                                                        }

                                                        .psa table,
                                                        .psa th,
                                                        .psa td {
                                                            border: 1px solid black;
                                                            padding: 6px;
                                                        }

                                                        .psa table.no-border,
                                                        .no-border th,
                                                        .no-border td {
                                                            border: none;
                                                        }


                                                        .psa .w700 {
                                                            width: 700px;
                                                        }

                                                        .w350 {
                                                            width: 350px;
                                                        }

                                                        .psa .text-center {
                                                            text-align: center;
                                                        }

                                                        .sign p {
                                                            display: inline-block;
                                                            width: 172px;
                                                            margin: 50px 0;
                                                            font-weight: bold;
                                                        }

                                                        @media print {
                                                            @page {
                                                                margin: 10;
                                                            }

                                                            #btnEmpAssessment {
                                                                display: none;
                                                                ;
                                                            }

                                                        }
                                                        </style>



                                                        <div class="psa">
                                                            <div class="w700 text-center">
                                                                <h3>PERFORMANCE ASSESSMENT FORM</h3>
                                                            </div>
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="w350">
                                                                            NAME:{{Title}}{{Firstname}} {{Lastname}}
                                                                        </td>
                                                                        <td>EMP NO & DOJ:{{Employeeid}}
                                                                            {{Date_Of_Joing2}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>DEPARTMENT / FUNCTION:
                                                                            {{EmpDepartment}} </td>
                                                                        <td>REPORTING TO: </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">PERIOD COVERED FOR
                                                                            ASSESSMENT: FROM _______________
                                                                            TO
                                                                            _______________</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>


                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="6" align="center">
                                                                            <p><b>Rating scale: 1 - 10</b>
                                                                                <br />
                                                                                Rating description: 1-3:
                                                                                Poor;
                                                                                4-5: Satisfactory; 6-8:
                                                                                Good;
                                                                                9-10: Excellent
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <p><b>RATING DESCRIPTION</b></p>
                                                                        </td>
                                                                        <td style="width:10px"></td>
                                                                        <td style="width:103px;text-align: center;">
                                                                            POOR
                                                                            <br />
                                                                            (1-3)
                                                                        </td>
                                                                        <td style="width:103px;text-align: center;">
                                                                            SATISFACTORY
                                                                            <br />
                                                                            (4-5)
                                                                        </td>
                                                                        <td style="width:103px;text-align: center;">
                                                                            GOOD
                                                                            <br />
                                                                            (6-8)
                                                                        </td>
                                                                        <td style="width:103px;text-align: center;">
                                                                            EXCELLENT
                                                                            <br />
                                                                            (9-10)
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="6">
                                                                            <p><b>A PERSONAL ATTRIBUTES</b>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1 Attendance</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2 Punctuality</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3 Discipline</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="6">
                                                                            <p><b>B WORK RELATED
                                                                                    ATTRIBUTES</b>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1 Job Knowledge</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2 Productivity – Output</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3 Adherence to work instructions
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4 Accuracy of work</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5 Avoidance of Rejection /
                                                                            Reworks
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6 Adherence to timelines/targets
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7 Maintenance of
                                                                            workplace/machine
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="6">
                                                                            <p><b>C GENERAL ATTRIBUTES</b>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1 Creativity</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2 Initiative</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3 Adherence to Policy</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4 Attitude</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5 Inter-personal relationship
                                                                            with
                                                                            others</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <p><b>TOTAL SCORE (A+B+C)</b>
                                                                            </p>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="6">


                                                                            <table class="no-border">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <math
                                                                                                xmlns="http://www.w3.org/1998/Math/MathML">
                                                                                                <mi>Note:
                                                                                                    (Ratings
                                                                                                    on
                                                                                                    values
                                                                                                    prorated
                                                                                                    to
                                                                                                    maximum
                                                                                                    100
                                                                                                    marks)
                                                                                                </mi>
                                                                                                <mfrac>
                                                                                                    <mi> (Total
                                                                                                        scores)
                                                                                                        *
                                                                                                        100
                                                                                                    </mi>
                                                                                                    <mi>150
                                                                                                    </mi>
                                                                                                </mfrac>
                                                                                                <mo>=</mo>
                                                                                            </math>
                                                                                        </td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>



                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>


                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="text-center"><b>AREA
                                                                                    OF
                                                                                    STRENGTH</b></p>
                                                                        </td>
                                                                        <td rowspan="2"></td>
                                                                        <td>
                                                                            <p class="text-center"><b>AREA
                                                                                    FOR
                                                                                    IMPROVEMENT</b></p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="height: 100px;"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="height: 100px;">
                                                                            <p><b>LIST OUT MAJOR ACHIVEMENT
                                                                                    /
                                                                                    CONTRIBUTION:</b></p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="height: 100px;">
                                                                            <p><b>OBSERVATIONS /
                                                                                    RECOMMENDATIONS:<br /><span
                                                                                        style="color:#888888">(
                                                                                        To be filled in by
                                                                                        the
                                                                                        reporting manager
                                                                                        )</span></mute></b>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p><b>ATTENDANCE RECORD
                                                                                    (From____________ To
                                                                                    ____________):</b></p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign="middle" style="height: 100px;">
                                                                            <p>No of Days Present
                                                                                _______________<br /><br />

                                                                                No of Days Leave
                                                                                _______________<br /><br />

                                                                                No of Days LOP
                                                                                _______________
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p class="text-center"><b>Head
                                                                                    of
                                                                                    the department</b></p>
                                                                        </td>
                                                                        <td rowspan="2"></td>
                                                                        <td>
                                                                            <p class="text-center">
                                                                                <b>General
                                                                                    Manager</b>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign="top" style="height: 100px;">
                                                                            NAME:<br /><br />Remarks :</td>
                                                                        <td valign="top" style="height: 100px;">
                                                                            NAME:<br /><br />Remarks :</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <div class="sign w700">
                                                                <p>Employee Signature</p>
                                                                <p class="text-center">HOD Signature</p>
                                                                <p class="text-center">HRD Signature</p>
                                                                <p style="text-align: right;">GM Signature
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>







                </div>





                <div class="modal fade" id="ModalEditingReason" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">Editing Reasons</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">

                                    <label class="col-form-label">Editing Detail</label>


                                    <textarea class="form-control" ng-model="EditingReason"></textarea>


                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn  btn-success" ng-click="UpdateEditingReason();"
                                    data-dismiss="modal">Update</button>
                                <button class="btn  btn-warning" data-dismiss="modal" data-toggle="modal"
                                    data-target="#ModalLogin">Login</button>
                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-danger">
                                <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success" role="alert" ng-show="LogMessage">
                                    {{LogMessage}}
                                </div>

                                <div class="alert alert-danger" role="alert">

                                    <label class="col-form-label">Enter Userid</label>


                                    <input class="form-control" ng-model="EditingUserid" />
                                    <label class="col-form-label">Enter Password</label>


                                    <input class="form-control" ng-model="EditingPassword" type="password" />


                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn  btn-success" ng-click="UserLogin();">Submit</button>

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1AppointmentView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog application-modal modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee - Appointment - Order
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">



                                        <a id="btnAppointmentordertamil"
                                            class="btn btn-info btn-nda-down2 application-down-btn"><i
                                                class="fa fa-download"></i> Download</a>
                                        <div class="card-body">

                                            <div id="pdfExportAppointmentorder">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnAppointmentordertamil {
                                                            display: none;
                                                            ;
                                                        }

                                                    }
                                                    </style>

                                                    <br /><br />
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <img src="{{ClientLogo}}" width="100" height="70" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p><b>{{Clientname}}</b><br />
                                                                {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                {{ClientAddressLine3}},<br />
                                                                {{ClientCity}}-{{ClientZipcode}}.
                                                            </p>
                                                        </div>
                                                    </div>


                                                    <hr />
                                                    <center>
                                                        <h4>Appointment Order - பணி நியமன உத்தரவு</h4>
                                                    </center>


                                                    <p>பெறுதல்,</p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}
                                                        {{Lastname}}
                                                    </p>
                                                    <p>{{PermanentAddress}}
                                                        <br>
                                                        {{PermanentCountry}}
                                                        <br>
                                                        {{PermanentState}}
                                                        <br>
                                                        {{PermanentCity}}
                                                        <br>
                                                        {{PermanentPincode}}
                                                    </p>
                                                    <p>தேதி :</p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Date_Of_Joing2}}
                                                    </p>
                                                    <br />

                                                    <p>உங்களது விண்ணப்பம் நாள் : </p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Date_Of_Joing2}}
                                                    </p>

                                                    <p>அன்புடையீர்,</p>
                                                    <p>உங்களது <b><u> {{Date_Of_Joing2}}</b></u> தேதியிட்ட
                                                        விண்ணப்பத்தின்
                                                        அடிப்படையில்
                                                        உங்களை எமது
                                                        நிர்வாகம் பிரிவில் பணிக்கு நியமனம் செய்வதில்
                                                        பெருமைபடுகிறோம். உங்களது பணி முதல்
                                                        தகுதிக்கான அடிப்படையில் அமர்த்துகிறோம். உங்களுக்கான வேலை
                                                        நேரம் தினசரி 8 மணி
                                                        நேரம் ஆகும். உங்களது மாத சம்பளம் ரூ.
                                                        <b><u>
                                                                {{Gross_Salary - Performance_allowance | currency:''}}</b></u>
                                                        என்று
                                                        நிர்ணயிக்கப்படுகிறது.
                                                        உங்களது சம்பளம் பிரதி மாதம் <b>7- ஆம் தேதிக்குள்</b>
                                                        வழங்கப்படும்.
                                                    </p>


                                                    <p>இதில் அரசின் தொழிலாளர் நல சட்டங்களின் அடிப்படையில்
                                                        வருங்கால
                                                        வைப்பு நிதி EPF ஆனது
                                                        12 சதவிகிதமும் (12%), தொழிலாளர் அரசு காப்பிட்டு
                                                        கழகத்திற்கு
                                                        (ESI) 0.75
                                                        சதவிகிதமும், உங்களது அடிப்படை சம்பளத்தில் பிடித்தம்
                                                        செய்யப்படும். உங்களது
                                                        திறமையின் அடிப்படையிலும், செயல்பாடுகளின் அடிப்படையிலும்
                                                        உங்களை எமது
                                                        நிர்வாகத்தில் நிரந்தர பணியாளராக பணி நிரந்தரம்
                                                        செய்யப்படுவீர்கள்.</p>


                                                    <p> தங்களது உழைப்பை உண்மையுடன் நிறுவனத்திற்கு அளித்து
                                                        மென்மேலும்
                                                        வளர்ச்சியடைய
                                                        வாழ்த்துக்களை தெரிவித்து கொள்கிறோம்.
                                                        உண்மைநகல் பெற்றுக்கொண்டேன்.</p>



                                                    <p style="text-align:left;"><span
                                                            style="float:right;">இப்படிக்கு,</span></p>
                                                    <br />
                                                    <br />
                                                    <br />
                                                    <br />
                                                    <p style="text-align:left;"><span style="float:right;">நிர்வாகம்
                                                            /அங்கீகாரம் பெற்ற அதிகாரி</span></p>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1AppointmentHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg application-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee - Appointment - Order
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">



                                        <a id="btnAppointmentorderhindi"
                                            class="btn btn-info btn-nda-down2 application-down-btn"><i
                                                class="fa fa-download"></i> Download</a>
                                        <div class="card-body">

                                            <div id="pdfExportAppointmentorderHindi">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnAppointmentorderhindi {
                                                            display: none;
                                                            ;
                                                        }

                                                    }
                                                    </style>
                                                    <br /><br />
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <img src="{{ClientLogo}}" width="100" height="70" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p><b>{{Clientname}}</b><br />
                                                                {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                {{ClientAddressLine3}},<br />
                                                                {{ClientCity}}-{{ClientZipcode}}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <center>
                                                        <h4>APPOINMENT ORDER / भुगतान के आदेश</h4>
                                                    </center>



                                                    <p>To / मिल रहा :</p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}
                                                        {{Lastname}}
                                                    </p>
                                                    <p>{{PermanentAddress}}
                                                        <br>
                                                        {{PermanentCountry}}
                                                        <br>
                                                        {{PermanentState}}
                                                        <br>
                                                        {{PermanentCity}}
                                                        <br>
                                                        {{PermanentPincode}}
                                                    </p>
                                                    <p>DATE / दिनांक :</p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Date_Of_Joing2}}
                                                    </p>
                                                    <br /><br /><br />

                                                    <p>Ref : Your Application Date / आपका आवेदन दिनांकित है: </p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Date_Of_Joing2}}

                                                    <p>तुम्हारा,</p>

                                                    <p>दिनांकित आवेदन के आधार पर हमारा प्रशासन<b><u>
                                                                {{Date_Of_Joing2}}</b></u>अनुभाग
                                                        काम हमें नियुक्ति पर गर्व है। आपका काम
                                                        पहले हमें योग्यता के आधार पर दिन के लिए नियुक्त
                                                        किया जाता है। तुम्हारा काम के घंटे के बारे में 8 घंटे दैनिक
                                                        रहे हैं <b><u>
                                                                {{Gross_Salary - Performance_allowance | currency:''}}</b></u>आपका
                                                        मासिक
                                                        वेतन रु.आपका वेतन महीने की
                                                        7 तारीख तक भुगतान कर दिया जाएगा.</p>

                                                    <p>EPF अबे 12 प्रतिशत (12%), श्रम सरकार (ईएसआई) के लिए प्रतिशत
                                                        और आपका 0.75% आधार वेतन पर कटौती की जाएगी। अपनी क्षमता के
                                                        आधार पर, गतिविधियों के आधार पर, आप हमारे प्रशासन के एक
                                                        स्थायी कर्मचारी हैं स्थायी कार्य उपर्युक्त समयावधि के भीतर
                                                        किया जाएगा।</p>
                                                    <p>एक वास्तविक कंपनी में अपने स्वयं के श्रम को विकसित और विकसित
                                                        करना। से नमस्ते. </p>


                                                    <p>मुझे वास्तविक प्रति प्राप्त हुई है।</p>
                                                    <p>इस प्रकार,</p>

                                                    <p>व्यवस्थापक/मान्यता प्राप्त अधिकारी</p>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1ConfirmationView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg application-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee - Confirmation -
                                    Order-Tamil
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">



                                        <a id="btnConfirmationordertamil"
                                            class="btn btn-info btn-nda-down2 application-down-btn"><i
                                                class="fa fa-download"></i> Download</a>
                                        <div class="card-body">

                                            <div id="pdfExportConfirmationorder">

                                                <div class="pdf-sipl"><br /><br />

                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnConfirmationordertamil {
                                                            display: none;
                                                            ;
                                                        }

                                                    }
                                                    </style>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <img src="{{ClientLogo}}" width="100" height="70" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p><b>{{Clientname}}</b><br />
                                                                {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                {{ClientAddressLine3}},<br />
                                                                {{ClientCity}}-{{ClientZipcode}}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <center>
                                                        <h4>Confirmation Order / பணி நிரந்தர உத்தரவு</h4>
                                                    </center>


                                                    <p style="text-align:left;">To <br />பெறுதல்</p>
                                                    <p><span style="float:right;">DATE :
                                                            {{Date_Of_Joing2}}</span></p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}
                                                        {{Lastname}}
                                                    </p>
                                                    <p>{{PermanentAddress}}
                                                        <br>
                                                        {{PermanentCountry}}
                                                        <br>
                                                        {{PermanentState}}
                                                        <br>
                                                        {{PermanentCity}}
                                                        <br>
                                                        {{PermanentPincode}}
                                                    </p>
                                                    <br /><br /><br /><br /><br /><br />
                                                    <div>
                                                        <p>&emsp;&emsp;&emsp;&emsp;&emsp;உங்களது பணி நியமன உத்தரவு
                                                            <b><u>{{Date_Of_Joing2}}</u></b> தேதியிட்ட
                                                            கடிதத்தை தொடர்ந்து உங்களது திறமையின் அடிப்படையிலும்
                                                            உங்களின் நன்நடத்தை,
                                                            செயல்பாடுகளின் அடிப்படையிலும் உங்களை எமது நிர்வாகம்
                                                            <b><u>{{Date_Of_Joing2}}</b></u>முதல் பணி
                                                            நிரந்தரம் செய்வதில் பெருமிதம் கொள்கிறது. உங்களது சம்பளம்
                                                            கீழ்க்கண்டவாறு
                                                            நிர்ணயிக்கபடுகிறது.
                                                        </p>
                                                        <p>&emsp;&emsp;&emsp;&emsp;&emsp;சம்பளம் ரூ.
                                                            <b><u>
                                                                    {{Gross_Salary - Performance_allowance | currency:''}}</b></u>
                                                            நாள் / மாதம் மேலும்
                                                            பிடித்தங்களிலும் ஏனைய விதிமுறைகளிலும் எந்தவித மாற்றமும்
                                                            இல்லை. எனவே தொடந்து
                                                            உமது பணியை செவ்வனே செய்து நிர்வாகத்தின் வளர்ச்சியும்
                                                            தங்களின் வளர்ச்சியும்
                                                            மேம்பட வாழ்த்துகளை தெரிவித்து கொள்கிறது.
                                                        </p>
                                                    </div>
                                                    <p>இப்படிக்கு,</p>



                                                    <p style="text-align:left;">உண்மைநகல் பெற்றுக்கொண்டேன்<span
                                                            style="float:right;">நிர்வாகம் /அங்கீகாரம் பெற்ற
                                                            அதிகாரி</span></p>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1ConfirmationViewHindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg application-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee - Confirmation -
                                    Order-Hindi
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">



                                        <a id="btnConfirmationorderHindi"
                                            class="btn btn-info btn-nda-down2 application-down-btn"><i
                                                class="fa fa-download"></i> Download</a>
                                        <div class="card-body">

                                            <div id="pdfExportConfirmationorderHindi">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnConfirmationorderHindi {
                                                            display: none;
                                                            ;
                                                        }

                                                    }
                                                    </style>
                                                    <br /><br />
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <img src="{{ClientLogo}}" width="100" height="70" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p><b>{{Clientname}}</b><br />
                                                                {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                {{ClientAddressLine3}},<br />
                                                                {{ClientCity}}-{{ClientZipcode}}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <center>
                                                        <h4>CONFIRMATION ORDER</h4>
                                                    </center>

                                                    <style type="text/css">
                                                    table.doc-table {
                                                        border-collapse: collapse;
                                                        margin: 20px 0;
                                                    }

                                                    table.doc-table td,
                                                    table.doc-table th {
                                                        border: 1px solid #dddddd;
                                                        text-align: left;
                                                        padding: 8px;
                                                    }
                                                    </style>


                                                    <p style="text-align:left;">To / प्रति </p>

                                                    <p> <span style="float:right;">DATE / दिनांक:
                                                            {{Date_Of_Joing2}}</span></p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Title}}{{Firstname}}
                                                        {{Lastname}}
                                                    </p>
                                                    <p>{{PermanentAddress}}
                                                        <br />
                                                        {{PermanentCountry}}
                                                        <br />
                                                        {{PermanentState}}
                                                        <br />
                                                        {{PermanentCity}}
                                                        <br />
                                                        {{PermanentPincode}}
                                                    </p>
                                                    <br /><br /><br /><br /><br /><br />
                                                    <div>
                                                        <p>&emsp;&emsp;&emsp;&emsp;&emsp;आपका नियुक्ति
                                                            आदेश<b><u>{{Date_Of_Joing2}}</u></b> दिनांकित पत्र
                                                            आपकी जारी रखने और आचरण करने की क्षमता हमारे प्रशासन के
                                                            आधार पर <b><u>{{Date_Of_Joing2}}</b></u>
                                                            पहला कार्य स्थायी करने में गर्व लेता है. आपका वेतन
                                                            निम्नानुसार निर्धारित
                                                            होता है.</p>
                                                        <p>&emsp;&emsp;&emsp;&emsp;&emsp;वेतन रु
                                                            <b><u> {{Gross_Salary - Performance_allowance | currency:''}}
                                                            </b></u> अधिक
                                                            पसंदीदा पर दिन अन्य
                                                            शब्दों में कोई परिवर्तन नहीं हुआ है। तो तुम काम करने के
                                                            लिए जारी.
                                                        </p>
                                                        <p>&emsp;&emsp;&emsp;&emsp;&emsp;प्रशासन के प्रबंधन और विकास
                                                            में सुधार करने के
                                                            लिए.</p>
                                                    </div>
                                                    <p>इस प्रकार,</p>



                                                    <p style="text-align:left;">मुझे वास्तविक प्रति प्राप्त हुई है।
                                                        <span style="float:right;">व्यवस्थापक/मान्यता प्राप्त
                                                            अधिकारी</span>
                                                    </p>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1Employeeinterviewtamil" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog application-modal modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee - InterviewDetails
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">



                                        <a id="btnInterviewdetailstamil"
                                            class="btn btn-info btn-nda-down2 application-down-btn"><i
                                                class="fa fa-download"></i> Download</a>
                                        <div class="card-body">

                                            <div id="pdfExportInterviewdetailtamil">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnInterviewdetailstamil {
                                                            display: none;
                                                            ;
                                                        }

                                                    }

                                                    table.doc-table {
                                                        border-collapse: collapse;
                                                        margin: 20px 0;
                                                    }

                                                    table.doc-table td,
                                                    table.doc-table th {
                                                        border: 1px solid #dddddd;
                                                        text-align: left;
                                                        padding: 8px;
                                                    }
                                                        table td.tick-cellnew {
                                        font-size: 12px;
                                        color: black;
                                    }
                                                    </style>

                                                    <br /><br />
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <img src="{{ClientLogo}}" width="100" height="70" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p><b>{{Clientname}}</b><br />
                                                                {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                {{ClientAddressLine3}},<br />
                                                                {{ClientCity}}-{{ClientZipcode}}.
                                                            </p>
                                                        </div>
                                                    </div>


                                                    <hr />
                                                    <center>
                                                        <h4>நேர்காணல் குறிப்பு</h4>
                                                    </center>


                                                    <p style="text-align:left;">தொழிலாளியின் பெயர் :
                                                        {{Title}}{{Firstname}} {{Lastname}}<span style="float:right;">
                                                            பதவி : {{EmpDesignation}}</span></p>

                                                    <table class="doc-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>வ.எண்</td>
                                                                <td>விவரம்</td>
                                                                <td>ஆம்</td>
                                                                <td>இல்லை</td>
                                                                <td>குறிப்பு</td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>வயது சான்று பெறப்பட்டதா?</td>
                                                                 <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>கல்விச் சான்று சரிபார்க்கப்பட்டதா?</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>பணியார்வம் கண்டறியப்பட்டதா?</td>
                                                                <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>முன் அனுபவம் கேட்டறியப்பட்டதா?</td>
                                                                <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>வேலை நேரம் தெரிவிக்கப்பட்டதா?</td>
                                                               <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>பணி வரையறைகள் விளக்கப்பட்டதா?</td>
                                                                <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>நிர்வாக கொள்கைகள் எடுத்துரைக்கப்பட்டதா?</td>
                                                              <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>எந்த நிலையிலும் பணியாற்றுவாரா?</td>
                                                                <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>சாதி மத பேதமில்லா சூழலை உருவாக்குவாரா?</td>
                                                               <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>பணி நியமன ஆணை வழங்கப்பட்டதா?</td>
                                                                <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                    <p>அலுவலக பயன்பாட்டிற்க்கு</p>
                                                    <p>உறுப்பினர்களின் தன்னிலைப் பகிர்வு நேர்காணல் மற்றும் அவைசார் பூர்வ
                                                        விளக்கங்கள்</p>

                                                    <p>அடிப்படையில் இவர் {{EmpDesignation}} வேலைக்கு தகுதியானவர்
                                                        எனக்கருதி தற்காலிகம் / நிரந்தரம் பணியாளராக நியமனம் செய்ய
                                                        பரிந்துரை செய்கிறோம்.</p>

                                                    <p>குரும ஊதியசட்டப்படி இவரின் அடிப்படை ஊதியம் ரூபாய்/மாதம்
                                                        {{Basic | currency:''}} இதர
                                                        படிகளுடன் சேர்த்து நிர்ணயம் செய்யப்பட்ட ஊதியம் ரூபாய்
                                                        {{Gross_Salary - Performance_allowance | currency:''}} இதர
                                                        படிகளுடன் சேர்த்து</p>

                                                    <p>பிற படிகள் : {{HR_Allowance | currency:''}}+{{Other_Allowance | currency:''}}</p>
                                                
                                                    <p>ஆய்வு நாள் :{{Date_Of_Joing2}}</p>
                                                    <p>(மேலாளர் கையொப்பம்) :</p>
                                                    <p style="text-align:left;">தொழிலாளியின் பெயர் :
                                                        {{Title}}{{Firstname}} {{Lastname}}<span
                                                            style="float:right;">(துறை பொறுப்பாளர் கையொப்பம்)</span></p>




                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1Employeeinterviewhindi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog application-modal modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee - InterviewDetails
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">



                                        <a id="btnInterviewdetailshindi"
                                            class="btn btn-info btn-nda-down2 application-down-btn"><i
                                                class="fa fa-download"></i> Download</a>
                                        <div class="card-body">

                                            <div id="pdfExportInterviewdetailhindi">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnInterviewdetailshindi {
                                                            display: none;
                                                            ;
                                                        }

                                                    }

                                                    table.doc-table {
                                                        border-collapse: collapse;
                                                        margin: 20px 0;
                                                    }

                                                    table.doc-table td,
                                                    table.doc-table th {
                                                        border: 1px solid #dddddd;
                                                        text-align: left;
                                                        padding: 8px;
                                                    }
                                                        table td.tick-cellnew {
                                        font-size: 12px;
                                        color: black;
                                    }
                                                    </style>

                                                    <br /><br />
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <img src="{{ClientLogo}}" width="100" height="70" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <p><b>{{Clientname}}</b><br />
                                                                {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                {{ClientAddressLine3}},<br />
                                                                {{ClientCity}}-{{ClientZipcode}}.
                                                            </p>
                                                        </div>
                                                    </div>


                                                    <hr />
                                                    <center>
                                                        <h4>INTERVIEW DETAILS / साक्षात्कार विवरण</h4>
                                                    </center>


                                                    <p>EMPLOYEE NAME / कर्मचारी का नाम : {{Title}}{{Firstname}}
                                                        {{Lastname}}</p>
                                                    <p>DESIGNATION / पद :{{EmpDesignation}}</p>
                                                    <table class="doc-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>S.No</td>
                                                                <td>DETAILS</td>
                                                                <td>YES</td>
                                                                <td>NO</td>
                                                                <td>REMARKS</td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>क्या उम्र प्रमाणित की गई है? </td>
                                                                 <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>क्या शैक्षिक साक्ष्य की पुष्टि की गई है? </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>क्या कंसोल का पता लगाया गया था? </td>
                                                                  <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>क्या पहले का अनुभव सुना गया है? </td>
                                                                <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>क्या काम के घंटों की रिपोर्ट की गई थी? </td>
                                                               <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>क्या नौकरी परिभाषाएँ समझाई गई हैं? </td>
                                                                 <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>क्या प्रशासनिक नीतियों को विस्तृत किया गया है? </td>
                                                                 <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>क्या आप किसी भी स्तर पर काम करते हैं? </td>
                                                               <td><center><i class="fa fa-check" aria-hidden="true"></center></i></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>क्या जाति धार्मिक असहिष्णुता का माहौल बनाएगी?</td>
                                                                <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>क्या नियुक्ति आदेश जारी किया गया है? </td>
                                                               <td class="tick-cellnew" >
                                                    <center>&#x2714;</center>
                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                    <p>भोरा अफ़िज़ उसाचे ओनली / FOR OFFICE USE ONLY</p>
                                                    <p>साक्षात्कार और सदस्यों के प्रारंभिक स्पष्टीकरण के आधार पर
                                                        ___________________ काम
                                                        के लिए योग्य मैं </p>

                                                    <p>अस्थायी/स्थायी कर्मचारी के रूप में नियुक्ति की सिफारिश करता हूं।
                                                        मूल वेतन के
                                                        अंतर्गत, वेतन 100 रुपए है। अन्य चरणों में जोड़ें नियत मजदूरी रु.
                                                        _______</p>

                                                    <p>अन्य चरणों में जोड़ें.</p>

                                                    <p>अन्य चरण : NILL</p>
                                                    <p>कटौती : ESI = 0.75 %, EPF = 12%</p>
                                                    <p>अध्ययन दिवस :  {{Date_Of_Joing2}}</p>
                                                    <p>(विभाग प्रभारी)</p>
                                                    <p>(प्रबंधक)</p>





                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCenter1Employeecontract" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog application-modal modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee - ContractDetails
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">



                                        <a id="btnEmployeecontract"
                                            class="btn btn-info btn-nda-down2 application-down-btn"><i
                                                class="fa fa-download"></i> Download</a>
                                        <div class="card-body">

                                            <div id="pdfExportEmployeeContract">

                                                <div class="pdf-sipl">
                                                    <style>
                                                    @media print {
                                                        @page {
                                                            margin: 10;
                                                        }

                                                        #btnEmployeecontract {
                                                            display: none;
                                                            ;
                                                        }

                                                    }

                                                    .box {
                                                        width: 550px;
                                                        margin-right: auto;
                                                        margin-left: auto;
                                                    }

                                                    .box-data {
                                                        margin-top: 5px;
                                                        margin-left: 0px;
                                                        width: 550px;
                                                        border: 1px solid #888888;
                                                        display: inline-block;
                                                        padding: 40px;
                                                        font-size: 1.2rem;
                                                        line-height: 1.3;
                                                        text-align: center;
                                                    }
                                                    </style>

                                                    <br /><br />
                                                    <div class="row">
                                                            <div class="col-lg-6">
                                                                <img src="{{ClientLogo}}" width="100" height="70" />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><b>{{Clientname}}</b><br />
                                                                    {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                                    {{ClientAddressLine3}},<br />
                                                                    {{ClientCity}}-{{ClientZipcode}}.
                                                                </p>
                                                            </div>
                                                        </div>

                                                    <hr />

                                                    <center>
                                                        <h4>Employee Contract</h4>
                                                    </center>
                                                    <center>
                                                        (BETWEEN EMPOLYER AND EMPLOYEE)
                                                    </center>
                                                    <center>
                                                        (EMPLOYER)
                                                    </center>




                                                    <br />

                                                    <br /><br /><br />

                                                    <div class="box">
                                                        <div class="box-data">
                                                            {{Clientname}}<br />
                                                            {{ClientAddressLine1}} {{ClientAddressLine2}},
                                                            {{ClientAddressLine3}},<br />
                                                            {{ClientCity}}-{{ClientZipcode}}.
                                                        </div>
                                                    </div>

                                                    <center>
                                                        <br /><br /><br /><br />Vs<br /><br /><br /><br />
                                                    </center>
                                                    <center>
                                                        [EMPLOYEE]
                                                    </center>
                                                    <br />
                                                    <br />
                                                    <div class="box">
                                                        <div class="box-data">
                                                            {{Title}}{{Firstname}} {{Lastname}}
                                                            <br />
                                                            {{PermanentAddress}}
                                                            <br />
                                                            {{PermanentCountry}}
                                                            <br />
                                                            {{PermanentState}}
                                                            <br />
                                                            {{PermanentCity}}
                                                            <br />
                                                            {{PermanentPincode}}

                                                        </div>
                                                    </div>


                                                </div>










                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
  <div class="modal fade emp-modal" id="ModalCenterTamilEmpReportView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Forms(Tamil)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Empformstamilpath}}"
                                        ng-hide="Empformstamilpath == null || Empformstamilpath == '' "
                                        ng-show="Empformstamilpath != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade emp-modal" id="ModalCenterHindiEmpReportView" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert alert-info">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Employee Forms(Hindi)
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe ng-src="{{Empformshindipath}}"
                                        ng-hide="Empformshindipath == null || Empformshindipath == '' "
                                        ng-show="Empformshindipath != null " style="height:400px;width:100%"></iframe>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-rounded btn-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
