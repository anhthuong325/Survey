var countre=1;
function add_more_field(){
    countre+=1;
    html='<div class="row" id="row'+countre+'">\
            <div class="col-1">\
                <input type="radio" name="survey_options'+countre+'" class="form-control" style = "width: 20px; height: 30px;">\
            </div>\
            <div class="col-5">\
                <input type="text" name="survey_options_name'+countre+'" class="form-control" size="22" placeholder="Nhập lựa chọn thích hợp">\
            </div>\
        </div>'
    var form = document.getElementById('option-form')
    form.innerHTML+=html

    // #tomorrow pop-up enter link survey indexpage
    // how to select only one radio
}