<style>
#mainForm .error{
    font-size: 14px;
    color:#FF386A;
}

.form_adding_div{
    width:900px;
    margin:0 auto;
    font-family: cursive;
    font-size: 100%;
    padding-left: 370px;
}


.companyName{
    margin-top: 50px;
    width: 400px;
}


#companyNameDiv{
    margin-top:-19px;
    margin-left: 180px;

}

#companyNameInput{
    width:200px;
    height: 36px;
}

doesnotexist:-o-prefocus, #companyNameInput {
    margin-top: 20px;
}


#companyNameLabel{
    font-weight: bolder;
    margin-top: 4px;
    position: absolute;

}

.companyReg {
    /*
        border:1px solid black;
    */
    margin-top: 50px;
    width: 400px;

}
#companyRegLabel{
    font-weight:bolder;
    position: absolute;
    margin-top: 4px;
}

doesnotexist:-o-prefocus, #companyRegLabel {
    margin-top: -16px;
}


#companyRegInput{
    width:224px;
    height: 36px;
}

doesnotexist:-o-prefocus, #companyRegInput {
    margin-top: 1px;
}



#companyRegDiv{
    margin-top:-22px;
    margin-left: 180px;
}

.companyCity{
    margin-top: 50px;
    width:400px;
}

#companyCityLabel{
    font-weight: bolder;
    position: absolute;
    margin-top: 4px;
}

doesnotexist:-o-prefocus, #companyCityLabel {
    margin-top: -16px;
}


#companyCityDiv{
    margin-top:-22px;
    margin-left: 180px;
}

#companyCityInput{
    width:224px;
    height: 36px;
}


.websiteDiv{
    width:400px;
    margin-top: 50px;
}

#websiteLabel{
    font-weight: bolder;
    position: absolute;
    margin-top: 4px;
}

#mainForm #websiteNameInput.error{
    font-size: 14px;
    color:#FF386A;
    margin-top: 10px;
    display: block;
}

doesnotexist:-o-prefocus, #websiteLabel {
    margin-top: -15px;
}


#websiteName{
    margin-left: 181px;
    margin-top:-21px;
    width: 400px;
}

#websiteNameInput{
    width:121px;
    height: 36px;
}

#websiteNameStat{
    width:78px;
    height: 31px;
    border: 1px solid grey;
    font-weight: bolder;
    font-size:11px;
    margin-left:125px;
    position: absolute;
    padding-left: 5px;
    padding-top: 9px;

}

#websiteNameCustom{
    width:176px;
    height:31px;
    border: 1px solid grey;
    font-weight: bolder;
    font-size:11px;
    margin-left:209px;
    position: absolute;
    padding-left: 6px;
    padding-top: 9px;
}

#websiteNameCustom:hover{
    background-color:lightblue;
}


.companyTelephone{
    width: 400px;
    margin-top: 40px;

}

#companyTelephoneLabel{
    font-weight: bolder;
    position: absolute;
    margin-top: 4px;
}

doesnotexist:-o-prefocus, #companyTelephoneLabel {
    margin-top: -5px;
}


#companyTelephoneDiv{
    margin-left: 180px;
    margin-top: -10px;
}


#companyTelephoneInput{
    width: 200px;
    height: 36px;

}

.companyShift{
    margin-top: 40px;
    width: 400px;

}

#companyShiftLabel{
    font-weight: bolder;
    position: absolute;
    margin-top: 4px;
}

#companyShiftDiv{
    margin-left: 180px;
    margin-top: -10px;
}

#companyShiftInput{
    width: 200px;
    height: 36px;

}

.submitButton{
}

#submitButtonInput{
    width: 100px;
    margin-left: 180px;
    margin-top: 40px;
}

#submitButtonSave {
    width: 100px;
    height: 36px;
    background-color: lightblue;
    border: 1px solid lightblue;
    font-weight: bolder;
    font-size: 13px;
    font-family: cursive;
}

.companyShiftHide{
    border:1px solid lightgoldenrodyellow;
    background-color: honeydew;
    width:500px;
    height:300px;
    display: none;
    margin-top: 36px;
}

.


    </style>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->


<div>

    <script type="text/javascript">
        require.paths.form_adding = "/component/form_adding/template/<?= $this->template ?>/js/form_adding";
        require.paths.city_selection = "/component/form_adding/template/<?= $this->template ?>/js/city_selection";

    </script>


    <link class="form_adding">

        <div>

        <form id="mainForm">

        <div class="form_adding_div">

            <div class="companyName">
                <label id="companyNameLabel">
                    Название компании
                </label>

                <div id="companyNameDiv">
                    <input type="text" id="companyNameInput" name="nameOfCompany"/>
                </div>
            </div>
            <div class="companyReg">
                <label id="companyRegLabel">Область</label>
                <div id="companyRegDiv">
                    <select id="companyRegInput" name="regOfCompany">
                        <option value="">--Выберите область--</option>
                        <option>Брестская</option>
                        <option>Витебская</option>
                        <option>Гомельская</option>
                        <option>Гродненская</option>
                        <option>Минская</option>
                        <option>Могилевская</option>
                    </select>
                </div>
            </div>
            <div class="companyCity">
                <label id="companyCityLabel">Город</label>
                <div id="companyCityDiv">
                    <select id="companyCityInput" name="cityOfCompany">

                    </select>
                </div>
            </div>
            <div class="websiteDiv">
                <label id="websiteLabel">Сайт</label>
                <div id="websiteName">
                    <div id="websiteNameStat">xozmarket.by</div>
                    <div id="websiteNameCustom">Можно изменить на свой. Как?</div>
                    <input id="websiteNameInput" type="text"  name="websiteOfCompany"/>
                </div>
                </div>
            <div class="companyTelephone">
                <label id="companyTelephoneLabel">
                    Телефон
                </label>

                <div id="companyTelephoneDiv">
                    <input type="text" id="companyTelephoneInput" name="telephoneOfCompany"/>

                </div>
            </div>
            <!--<script type="text/javascript">
                $(document).ready(function(){
                $('#companyShiftInput').click(function(){
                    $('.companyShiftHide').show();
                });
                });
            </script>-->
            <div class = "companyShift">
                <label id = "companyShiftLabel">
                    Время работы
                </label>
                <div id="companyShiftDiv">
                    <input type="text" id="companyShiftInput" name="shiftOfCompany" />
                </div>
            </div>

            <div class = "companyShiftHide">



            </div>

            <div class="submitButton">
                <div id="submitButtonInput">
                    <button type="submit" onclick="return form_adding();" id="submitButtonSave">Сохранить</button>
                </div>
            </div>
        </form>

        </div>

</div>

