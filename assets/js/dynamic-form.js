var survey_options = document.getElementById('survey_options');
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');

    add_more_fields.onclick = function(){
    var newField1 = document.createElement('input1');
        newField1.setAttribute('type','checkbox');
        newField1.setAttribute('name','survey_options[]');
        newField1.setAttribute('class','survey_options');
        newField1.setAttribute('siz',50);
    var newField2 = document.createElement('input2');
        newField2.setAttribute('type','text');
        newField2.setAttribute('name','survey_options[]');
        newField2.setAttribute('class','survey_options');
        newField2.setAttribute('siz',22);
    survey_options.appendChild(newField1, newField2);
    }

    remove_fields.onclick = function(){
    var input_tags = survey_options.getElementsByTagName('input1','input2');
        if(input_tags.length > 2) {
            survey_options.removeChild(input_tags[(input_tags.length) - 1]);
        }
    }