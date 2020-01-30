function createBikeInputFormElement(formId, inputName){
    const form = document.getElementById(formId);
    const div = document.createElement("div");
    div.className = "bikeFormElement";
    const label = document.createElement("label");
    label.textContent = inputName  + ": ";
    const input = document.createElement("input");
    input.id = inputName;
    input.required = true;
    input.className = "interaction"
    div.appendChild(label);
    div.appendChild(input);
    form.appendChild(div);
}

function createBikeDropdownFormElement(formId, inputName, elements){
    const form = document.getElementById(formId);
    const div = document.createElement("div");
    div.id = inputName;
    div.className = "bikeFormElement";
    const label = document.createElement("label");
    label.textContent = inputName  + ": ";
    const select = document.createElement("select");
    select.id = inputName;
    select.className = "interaction"
    elements.forEach(element => {
        const option = document.createElement("option");
        option.text = element;
        select.appendChild(option);
    });

    div.appendChild(label);
    div.appendChild(select);
    form.appendChild(div);
}

function createBikeTextAreaFormElement(formId, inputName, charLimit,textAreaRowCount){
    const form = document.getElementById(formId);
    const div = document.createElement("div");
    div.id = inputName + ": "
    div.className = "bikeFormElement";
    const label = document.createElement("label");
    label.textContent = inputName + ": ";
    const inputDiv = document.createElement("div");
    inputDiv.className = "TextArea";
    const counterBox = document.createElement("p");
    counterBox.className = "counter";
    counterBox.textContent = charLimit;
    const textarea = document.createElement("textarea");
    textarea.maxLength = charLimit;
    textarea.className = "interaction";
    textarea.id = inputName;
    textarea.rows = textAreaRowCount;
    textarea.cols = calcTextAreaHeight(charLimit,textAreaRowCount);
    textarea.style.resize = "none";
    textarea.addEventListener("input", function(){
        counterBox.textContent = charLimit - textarea.textContent.length;
    });
    div.appendChild(label);
    inputDiv.appendChild(counterBox);
    inputDiv.appendChild(textarea);
    div.appendChild(inputDiv)
    form.appendChild(div);
}

function calcTextAreaHeight(charLimit,rows){
    let col = 1
    while(col*rows < charLimit){
        col += 1;
    }
    col + charLimit.length
    return col;
}

function createDateElements(formId, labelText){
    const form = document.getElementById(formId);
    const label = document.createElement("label");
    const month = document.createElement("select");
    const day = document.createElement("select");
    const year = document.createElement("select");

    day.className = "bear-dates";
    month.className = "bear-months";
    year.className = "bear-years";
    label.textContent = labelText;

    form.appendChild(day);
    form.appendChild(month);
    form.appendChild(year);

}

function createFormSubmit(formId){
    const form = document.getElementById(formId);
    const button = document.createElement("button");
    const input = document.createElement("input");
    input.type = "submit";
    input.style.display = "none"
    form.appendChild(input);
    button.textContent = "Odeslat rezervaci"
    button.addEventListener("click", function(event){
        const email = document.getElementById("Email");
        if(!email.value.contains("@")){
            errorMessage('Prosím zadejte validní Email');
        }
        else{

            input.click();
        }
    });
    form.appendChild(button);
}




