<<<<<<< HEAD
<div class="card" ng-show="btnExpereience">
    <h5 class="card-header text-green">Experience Certificate</h5>
    <div class="card-body">
        <a id="experience_letter_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">
            <div id="ExperienceCertificateExport">

                <style>
                    @media print {
                        .noprint {
                            visibility: hidden !important;
                        }

                        @page {
                            size: A4;
                            margin: 20mm;
                        }

                        .exp_data {
                            width: 210mm;
                            height: 297mm;
                            margin: 0;
                            line-height: 1.5;
                        }
                    }

                    .exp_data {
                        position: relative;
                        font-family: Tahoma, sans-serif;
                        margin: 0px;
                        padding: 0;
                        line-height: 1.5;
                        text-align: justify;
                    }

                    .exp_data .container {
                        margin: auto;
                        padding: 140px;
                    }

                    .exp_data .headers {
                        margin-bottom: 0px;
                        position: absolute;
                        left: 25px;
                        top: 20px;
                    }

                    .exp_data .headers img {
                        max-width: 150px;
                        height: auto;
                        width: 200px;
                        margin-bottom: 0px;
                    }


                    .exp_data .address {
                        position: absolute;
                        text-align: right;
                        right: 40px;
                        top: -2px;
                        font-size: 12px;
                    }

                    .exp_data .cname {
                        font-weight: bold;
                    }

                    .exp_data .adj-space {
                        height: 100px;

                    }


                    .exp_data .content {
                        margin-top: 20px;
                        margin-bottom: 20px;
                        padding: 40px;
                    }

                    .exp_data .page_date {
                        text-align: right;
                    }

                    .exp_data .to-whom {
                        text-align: center;
                        font-size: 18px;
                        margin: 120px 0 30px 0;
                        text-decoration: underline;
                        text-underline-offset: 4px;
                    }

                    .exp_data .signature {
                        margin-top: 40px;
                    }
                </style>

                <div class="exp_data">
                    <div class="noprint">
                        <div class='headers'>
                            <img src='sainmarks.png' alt='Company Logo'>
                        </div>
                        <div class='address'>
                            <p><b>{{Clientname}}</b><br /> {{ClientAddressLine1}}<br />
                                {{ClientAddressLine2}}<br />
                                {{ClientAddressLine3}}<br />
                                {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                            </p>
                        </div>
                        <div class='adj-space'></div>
                        <hr />
                    </div>

                    <br/><br/>
                    <div class='content'>
                   
                        <p class='page_date'>Date : {{ReleivingDate2}}</p>
                        <p class='to-whom'>TO WHOM SO EVER IT MAY CONCERN</p>
                        <p>This is to certify that <b>{{Employeename}}</b> has worked with <b>{{Clientname}}</b> as a <b>{{EmpDesignation}}</b> from dated <b>{{Date_Of_Joing2}}</b> to <b>{{ReleivingDate2}}</b>.</p>
                        <p>During {{printgender1}} working period, we found {{printgender2}} to be sincere, honest, hardworking, dedicated employee with a professional attitude and very good job knowledge.</p>
                        <p>This letter serves as a record of {{Employeename}}’s employment with us and is issued for {{printgender2}} to use as needed.</p>
                        <p>We wish all the best in {{printgender1}} future endeavours.</p>
                        <div class='signature'>
                            <p>Sincerely,</p>
                            <br />
                            <p>{{Clientname}}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="card" ng-show="btnRelieving">
    <h5 class="card-header text-green">Relieving letter</h5>
    <div class="card-body">
        <a id="relieving_letter_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="releving_date_manual">Relieving Custom Date</label>
                        <input type="date" class="form-control" id="releving_date_manual" ng-model="releving_date_manual" ng-change="relievingmanual();">
                    </div>
                </div>
            </div>
            <hr />
            <div id="RelievingExport">

                <style>
                    @media print {
                        .noprint {
                            visibility: hidden !important;
                        }

                        @page {
                            size: A4;
                            margin: 20mm;
                        }

                        .relv_data {
                            width: 210mm;
                            height: 297mm;
                            margin: 0;
                            line-height: 1.5;
                        }
                    }

                    .relv_data {
                        position: relative;
                        font-family: Tahoma, sans-serif;
                        margin: 0px;
                        padding: 0;
                        line-height: 1.5;
                        text-align: justify;
                    }

                    .relv_data .container {
                        margin: auto;
                        padding: 140px;
                    }

                    .relv_data .headers {
                        margin-bottom: 0px;
                        position: absolute;
                        left: 25px;
                        top: 20px;
                    }

                    .relv_data .headers img {
                        max-width: 150px;
                        height: auto;
                        width: 200px;
                        margin-bottom: 0px;
                    }


                    .relv_data .address {
                        position: absolute;
                        text-align: right;
                        right: 40px;
                        top: -2px;
                        font-size: 12px;
                    }

                    .relv_data .cname {
                        font-weight: bold;
                    }

                    .relv_data .adj-space {
                        height: 100px;

                    }


                    .relv_data .content {
                        margin-top: 0px;
                        margin-bottom: 20px;
                        padding: 40px;
                    }

                    .relv_data .page_date {
                        text-align: right;
                    }

                    .relv_data .to-whom {
                        text-align: center;
                        font-size: 18px;
                        margin: 120px 0 30px 0;

                    }

                    .relv_data .signature {
                        margin-top: 40px;
                    }
                </style>

                <div class="relv_data">

                    <div class="noprint">
                        <div class='headers'>
                            <img src='sainmarks.png' alt='Company Logo'>
                        </div>
                        <div class='address'>
                            <p><b>{{Clientname}}</b><br /> {{ClientAddressLine1}}<br />
                                {{ClientAddressLine2}}<br />
                                {{ClientAddressLine3}}<br />
                                {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                            </p>
                        </div>


                        <div class='adj-space'></div>
                        <hr />
                    </div>
                    <br/><br/>
                    <div class='content'>
                     
                        <p class='page_date'>Date :{{ReleivingDate2}}</p>
                        <p class='to-whom'><u>Relieving letter</u></p>

                        <p class='mb-0'>To :</br>
                            {{Employeename}}</br>
                            {{Permanantaddress}}</br>
                            {{Peremenantstate}}</br>
                            {{Permanantcity}}</br>
                            {{Permanantpincode}}-{{Permanantcountry}}
                        </p>
                        <br />
                        <p>Dear <b>{{Employeename}}</b>,</p>
                        <p>This is acknowledging the receipt of your resignation letter dated on <b>{{Manualrelievedata}}</b>. While accepting the same, we thank you very much for the close association you had with us during the tenure <b>{{Date_Of_Joing2}}</b> to <b>{{ReleivingDate2}}</b>.</p>
                        <p>You have been relieved from your services with effect from the closing working hours of {{ReleivingDate2}}.</p>
                        <p>This letter serves as a record of {{Employeename}}’s employment with us and is issued for {{printgender2}} to use as needed.</p>
                        <p>We wish you all the best in your future endeavours.</p>

                        <p>Thanking you</p>
                        <br />
                        <p>{{Clientname}}</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
=======
<div class="card" ng-show="btnExpereience">
    <h5 class="card-header text-green">Experience Certificate</h5>
    <div class="card-body">
        <a id="experience_letter_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">
            <div id="ExperienceCertificateExport">

                <style>
                    @media print {
                        .noprint {
                            visibility: hidden !important;
                        }

                        @page {
                            size: A4;
                            margin: 20mm;
                        }

                        .exp_data {
                            width: 210mm;
                            height: 297mm;
                            margin: 0;
                            line-height: 1.5;
                        }
                    }

                    .exp_data {
                        position: relative;
                        font-family: Tahoma, sans-serif;
                        margin: 0px;
                        padding: 0;
                        line-height: 1.5;
                        text-align: justify;
                    }

                    .exp_data .container {
                        margin: auto;
                        padding: 140px;
                    }

                    .exp_data .headers {
                        margin-bottom: 0px;
                        position: absolute;
                        left: 25px;
                        top: 20px;
                    }

                    .exp_data .headers img {
                        max-width: 150px;
                        height: auto;
                        width: 200px;
                        margin-bottom: 0px;
                    }


                    .exp_data .address {
                        position: absolute;
                        text-align: right;
                        right: 40px;
                        top: -2px;
                        font-size: 12px;
                    }

                    .exp_data .cname {
                        font-weight: bold;
                    }

                    .exp_data .adj-space {
                        height: 100px;

                    }


                    .exp_data .content {
                        margin-top: 20px;
                        margin-bottom: 20px;
                        padding: 40px;
                    }

                    .exp_data .page_date {
                        text-align: right;
                    }

                    .exp_data .to-whom {
                        text-align: center;
                        font-size: 18px;
                        margin: 120px 0 30px 0;
                        text-decoration: underline;
                        text-underline-offset: 4px;
                    }

                    .exp_data .signature {
                        margin-top: 40px;
                    }
                </style>

                <div class="exp_data">
                    <div class="noprint">
                        <div class='headers'>
                            <img src='sainmarks.png' alt='Company Logo'>
                        </div>
                        <div class='address'>
                            <p><b>{{Clientname}}</b><br /> {{ClientAddressLine1}}<br />
                                {{ClientAddressLine2}}<br />
                                {{ClientAddressLine3}}<br />
                                {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                            </p>
                        </div>
                        <div class='adj-space'></div>
                        <hr />
                    </div>

                    <br/><br/>
                    <div class='content'>
                   
                        <p class='page_date'>Date : {{ReleivingDate2}}</p>
                        <p class='to-whom'>TO WHOM SO EVER IT MAY CONCERN</p>
                        <p>This is to certify that <b>{{Employeename}}</b> has worked with <b>{{Clientname}}</b> as a <b>{{EmpDesignation}}</b> from dated <b>{{Date_Of_Joing2}}</b> to <b>{{ReleivingDate2}}</b>.</p>
                        <p>During {{printgender1}} working period, we found {{printgender2}} to be sincere, honest, hardworking, dedicated employee with a professional attitude and very good job knowledge.</p>
                        <p>This letter serves as a record of {{Employeename}}’s employment with us and is issued for {{printgender2}} to use as needed.</p>
                        <p>We wish all the best in {{printgender1}} future endeavours.</p>
                        <div class='signature'>
                            <p>Sincerely,</p>
                            <br />
                            <p>{{Clientname}}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="card" ng-show="btnRelieving">
    <h5 class="card-header text-green">Relieving letter</h5>
    <div class="card-body">
        <a id="relieving_letter_btn" class="btn btn-sm btn-info btn-nda-down"><i class="fa fa-download"></i>
            Download</a>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="releving_date_manual">Relieving Custom Date</label>
                        <input type="date" class="form-control" id="releving_date_manual" ng-model="releving_date_manual" ng-change="relievingmanual();">
                    </div>
                </div>
            </div>
            <hr />
            <div id="RelievingExport">

                <style>
                    @media print {
                        .noprint {
                            visibility: hidden !important;
                        }

                        @page {
                            size: A4;
                            margin: 20mm;
                        }

                        .relv_data {
                            width: 210mm;
                            height: 297mm;
                            margin: 0;
                            line-height: 1.5;
                        }
                    }

                    .relv_data {
                        position: relative;
                        font-family: Tahoma, sans-serif;
                        margin: 0px;
                        padding: 0;
                        line-height: 1.5;
                        text-align: justify;
                    }

                    .relv_data .container {
                        margin: auto;
                        padding: 140px;
                    }

                    .relv_data .headers {
                        margin-bottom: 0px;
                        position: absolute;
                        left: 25px;
                        top: 20px;
                    }

                    .relv_data .headers img {
                        max-width: 150px;
                        height: auto;
                        width: 200px;
                        margin-bottom: 0px;
                    }


                    .relv_data .address {
                        position: absolute;
                        text-align: right;
                        right: 40px;
                        top: -2px;
                        font-size: 12px;
                    }

                    .relv_data .cname {
                        font-weight: bold;
                    }

                    .relv_data .adj-space {
                        height: 100px;

                    }


                    .relv_data .content {
                        margin-top: 0px;
                        margin-bottom: 20px;
                        padding: 40px;
                    }

                    .relv_data .page_date {
                        text-align: right;
                    }

                    .relv_data .to-whom {
                        text-align: center;
                        font-size: 18px;
                        margin: 120px 0 30px 0;

                    }

                    .relv_data .signature {
                        margin-top: 40px;
                    }
                </style>

                <div class="relv_data">

                    <div class="noprint">
                        <div class='headers'>
                            <img src='sainmarks.png' alt='Company Logo'>
                        </div>
                        <div class='address'>
                            <p><b>{{Clientname}}</b><br /> {{ClientAddressLine1}}<br />
                                {{ClientAddressLine2}}<br />
                                {{ClientAddressLine3}}<br />
                                {{ClientCity}}-{{ClientZipcode}}, {{ClientCountry}}
                            </p>
                        </div>


                        <div class='adj-space'></div>
                        <hr />
                    </div>
                    <br/><br/>
                    <div class='content'>
                     
                        <p class='page_date'>Date :{{ReleivingDate2}}</p>
                        <p class='to-whom'><u>Relieving letter</u></p>

                        <p class='mb-0'>To :</br>
                            {{Employeename}}</br>
                            {{Permanantaddress}}</br>
                            {{Peremenantstate}}</br>
                            {{Permanantcity}}</br>
                            {{Permanantpincode}}-{{Permanantcountry}}
                        </p>
                        <br />
                        <p>Dear <b>{{Employeename}}</b>,</p>
                        <p>This is acknowledging the receipt of your resignation letter dated on <b>{{Manualrelievedata}}</b>. While accepting the same, we thank you very much for the close association you had with us during the tenure <b>{{Date_Of_Joing2}}</b> to <b>{{ReleivingDate2}}</b>.</p>
                        <p>You have been relieved from your services with effect from the closing working hours of {{ReleivingDate2}}.</p>
                        <p>This letter serves as a record of {{Employeename}}’s employment with us and is issued for {{printgender2}} to use as needed.</p>
                        <p>We wish you all the best in your future endeavours.</p>

                        <p>Thanking you</p>
                        <br />
                        <p>{{Clientname}}</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</div>