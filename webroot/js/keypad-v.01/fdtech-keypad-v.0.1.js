/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var current_ele = null;

function getKeyValue(ele) {
    //console.log(ele.value);
    //current_ele.value = current_ele.value + ele.value;
    setValue(current_ele.value + ele.value);


}

function setValue(value) {
    //console.log('setValue:'+value);
    var str = value.toString();
    if (str.startsWith("0")) {
        str = str.substring(1);
    }
    current_ele.value = str;
    var number_str = 0;
    //number_str = new Intl.NumberFormat('en-IN', {maximumFractionDigits: 4}).format(value);
    if (number_str == 'NaN') {
        number_str = value;
    }
    $('h3[data-name="key-show-number"]').text(str);
    //$('input[data-name="key-enter-number"]').val(value);

}

$(document).ready(function () {
    var html_pad = '<div style="width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.4);z-index: 99999;display:block;position:fixed;top: 0;bottom:0;display:none;" id="box-numpad">';
    html_pad += '        <div class="row mt-3">';
    html_pad += '            <div class="col-6 offset-3 border border-white rounded-sm" style="background-color: rgba(0, 0, 0, 0.7);">';
    html_pad += '                <div class="row">';
    html_pad += '                    <div class="col-10 text-right my-2 pr-0 bg-white" style="background-clip: content-box;">';
    html_pad += '                        <h3 class="py-1 px-1" data-name="key-show-number">0</h3>';
    html_pad += '                        <input type="hidden" name="key-enter-number" data-name="key-enter-number" value="0"/>';
    html_pad += '                    </div>';
    html_pad += '                    <div class="col-2 my-2 pl-0">';
    html_pad += '                        <button type="button" class="btn btn-primary waves-effect btn-block btn-lg py-1 rounded-0" data-name="key-del" style="height: 100%;">DEL</button>';
    html_pad += '                    </div>';

    html_pad += '                </div>';
    html_pad += '                <div class="row">';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="7">7</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="8">8</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="9">9</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="-">-</button></div>';

    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="4">4</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="5">5</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="6">6</button></div>';
    html_pad += '                    <div class="col-md-3"></div>';

    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="1">1</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="2">2</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="3">3</button></div>';
    html_pad += '                    <div class="col-md-3"></div>';

    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value="0">0</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-light waves-effect btn-block btn-lg py-2" data-name="key" value=".">.</button></div>';
    html_pad += '                    <div class="col-md-3 pb-1"><button type="button" class="btn btn-success waves-effect btn-block btn-lg py-2" data-name="key-done">DONE</button></div>';
    html_pad += '                    <div class="col-md-3"></div>';

    html_pad += '                </div>';
    html_pad += '            </div>';
    html_pad += '        </div>';
    html_pad += '    </div>';

    $('body').prepend(html_pad);


    //box-numpad
    $('[data-action="numpad"]').each(function () {
        $(this).attr('readonly', true);
    });

    $('input[data-action="numpad"]').on('click', function () {
        current_ele = this;
        //console.log(this.value);
        //enterKey(this.value);
        var current_value = this.value;
        if (current_value == '') {
            current_value = '';
        }
        $('#box-numpad').show();
        setValue(current_value);
    });

    $('button[data-name="key-del"]').on('click', function () {
        var currect_value = current_ele.value;
        currect_value = currect_value.slice(0, -1);
        setValue(currect_value);
    });

    $('button[data-name="key"]').on('click', function () {
        getKeyValue(this);
    });
    $('button[data-name="key-done"]').on('click', function () {
        $('#box-numpad').hide();
    });

});