const weekDays = ["Po", "Út", "St", "Čt", "Pá", "So", "Ne"];
const months = [];
const MAX = 8;
let currentIndex = 0;

let calenderDb = [];

let workHours = [[], //Ne
                [08,09,10,11,12,13,14,15,16], //Po
                [08,09,10,11,12,13,14,15,16], //Ut
                [08,09,10,11,12,13,14,15,16], //St
                [08,09,10,11,12,13,14,15,16], //Ct
                [08,09,10,11,12,13,14,15,16], //Pa
                []] //So
                

function createBikeInputFormElement(formId, inputName, dbName){
    const form = document.getElementById(formId);
    const div = document.createElement("div");
    div.className = "bikeFormElement";
    const label = document.createElement("label");
    label.textContent = inputName  + ": ";
    const input = document.createElement("input");
    input.id = inputName;
    input.name = dbName
    input.required = true;
    input.className = "interaction"
    div.appendChild(label);
    div.appendChild(input);
    form.appendChild(div);
}

function createBikeDropdownFormElement(formId, inputName, elements, dbName){
    const form = document.getElementById(formId);
    const div = document.createElement("div");
    div.id = inputName;
    div.className = "bikeFormElement";
    const label = document.createElement("label");
    label.textContent = inputName  + ": ";
    const select = document.createElement("select");
    select.id = inputName;
    select.name = dbName;
    select.className = "interaction"
    elements.forEach(element => {
        const option = document.createElement("option");
        option.text = element;
        select.appendChild(option);
    });

    div.appendChild(label);
    div.appendChild(select);
    form.appendChild(div);
    return select;
}

function createBikeTextAreaFormElement(formId, inputName, charLimit,textAreaRowCount,dbName){
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
    textarea.name = dbName;
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

}

function createFormSubmit(formId){
    const form = document.getElementById(formId);
    const button = document.createElement("button");
    const input = document.createElement("input");
    input.type = "submit";
    input.style.display = "none"
    form.appendChild(input);
    button.textContent = "Odeslat rezervaci"
    button.id = "submitButton"
    button.addEventListener("click", function(event){
        const email = document.getElementById("Email");
        /*
        if(!email.value.contains("@")){
            errorMessage('Prosím zadejte validní Email');
        }
        else{
            input.click();
           
        }
        */
        form.submit();
    });
    
    form.appendChild(button);
}

function removeOptions(selectbox)
{
    var i;
    for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
    {
        selectbox.remove(i);
    }
}

function createDateSelect(formId) {
    const form = document.getElementById(formId);
    const div = document.createElement("div");
    div.className = "bikeFormElement dateSelect"

    const dateSelectButton = document.createElement("div");

    const button = document.createElement("button");
    button.textContent = "Výběr dne"
    button.id = "displayedDate"

    const year = document.createElement("input")
    year.name = "chosenYear"
    year.id = "chosenYear"
    year.required = "true";
    year.style.display = "none"

    const month = document.createElement("input")
    month.name = "chosenMonth"
    month.id = "chosenMonth"
    month.required = "true";
    month.style.display = "none";

    const day = document.createElement("input")
    day.name = "chosenDay"
    day.id = "chosenDay"
    day.required = "true";
    day.style.display = "none";

    const date = document.createElement("input")
    day.name = "eventDate"
    day.id = "eventDate"
    day.required = "true";
    day.style.display = "none";

    button.addEventListener("click", function(event){
        event.preventDefault()
        document.getElementById("FormInputs").style.visibility = "hidden"
        document.getElementById("submitButton").style.visibility = "hidden"

        document.getElementById("pickDate").style.display = "flex"
        months[currentIndex].className = "month active";
    })

    const buttonLabel = document.createElement("label");
    buttonLabel.textContent = "Datum schůzky:"
    dateSelectButton.appendChild(buttonLabel)
    dateSelectButton.appendChild(button)

    const dropDownDiv = document.createElement("div");
    dropDownDiv.id = "hourDiv"

    const dropDownLabel = document.createElement("label");
    dropDownLabel.id = "hourLabel"
    dropDownLabel.textContent = "Čas:"

    const select = document.createElement("select");
    select.id = "availableHours"
    select.name = "TimeStart"

    
    dropDownDiv.appendChild(dropDownLabel);
    dropDownDiv.appendChild(select);
    dropDownDiv.style.display = "none"


    dateSelectButton.appendChild(dropDownDiv);
    div.appendChild(dateSelectButton);
    div.appendChild(year);
    div.appendChild(month);
    div.appendChild(day);
    form.appendChild(div)
}


/*
    XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX




    CALENDER SCRIPT




    XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

*/

function daysInMonth (month, year) { 
    return new Date(year, month + 1, 0).getDate(); 
} 

function dayStatus(givenMonth, givenDay){
    let result = 0;
    //console.log()
    for(x = 0; x < calenderDb.length; x++){
        
        const date = new Date(calenderDb[x].eventDate)
        const month = date.getMonth();
        const day = date.getDate();
        
        if(month == givenMonth && day == givenDay){
           // console.log("date " + date)
           // console.log("givenMonth " + givenMonth + " givenDay " + givenDay)
           // console.log("month " + month + " day " + day)
            result++;
        }
    }
    return result
}

function getAvailableHours(givenDay,givenMonth, year){
    let reservedHours = []
    var selectedDate = new Date();
    //console.log(year)
    //console.log(givenMonth)
    //console.log(givenDay)
    selectedDate.setFullYear(year,givenMonth,givenDay);
    for(i = 0; i < calenderDb.length; i++){
        const date = new Date(calenderDb[i].eventDate)
        const month = date.getMonth();
        const day = date.getDate();
        if(month == givenMonth && day == givenDay){
            console.log("Pushing " + calenderDb[i].TimeStart)
            reservedHours.push(calenderDb[i].TimeStart)
        }
    }

    let availableHours = []
    console.log("day of week is ")
    console.log(selectedDate.getDay()) 

    for(i = 0; i < workHours[selectedDate.getDay()].length; i++){
        const hour = workHours[selectedDate.getDay()][i]
        let found = false;
        for(z = 0; z < reservedHours.length; z++){
            //console.log("Hour is " + hour + " comparing with " + reservedHours[z])
            if(hour == reservedHours[z]){
                //console.log("Hey, got here");
                found = true;
            }
        }
        if(found == false){
            availableHours.push(hour);
        }
    }

    return availableHours;
}
function createCalender() {
    $.get("getCalenderDB.php", function(data, status){
        console.log("Data: " + data + "\nStatus: " + status);
        calenderDb = JSON.parse(data);
        let label = document.createElement("label");
        label.textContent = "Vyberte si den kliknutím na jeho datum"
        label.id = "Instructions"
        document.getElementById("pickDate").appendChild(label);
        let currentMonth = new Date().getMonth();
        let calenderContent = getMonths(currentMonth);
        let year = new Date().getFullYear();
        calenderContent.forEach(function(month){
            if(month < currentMonth){
                year += 1;
            }
            months.push(createMonth(month,year));
        });
        document.getElementById("pickDate").appendChild(createLegend());

    });
    
}
  

    
function createLegend(){
    let div = document.createElement("div");
    div.id = "legend";
    
    let free = document.createElement("div");
    free.className = "example free";

    let freeExplenation = document.createElement("p");
    freeExplenation.className = "colorExplenation"
    freeExplenation.textContent = "-  Zcela volný den"

    let partial = document.createElement("div");
    partial.className = "example partial";

    let partialExplenation = document.createElement("p");
    partialExplenation.className = "colorExplenation"
    partialExplenation.textContent = "-  Částečně volný den"

    
    let full = document.createElement("div");
    full.className = "example full";

    let fullExplenation = document.createElement("p");
    fullExplenation.className = "colorExplenation"
    fullExplenation.textContent = "-  Zaplněný den"

    
    div.appendChild(free);
    div.appendChild(freeExplenation);

    div.appendChild(partial);
    div.appendChild(partialExplenation);


    div.appendChild(full);
    div.appendChild(fullExplenation);

    return div;
}

function activate(monthsIndex){
    //console.log("monthIndex is " + monthsIndex);
    //console.log("index is " + monthsIndex + " element is: ")
    //console.log(months[monthsIndex]);
    months[monthsIndex].className = "month active";
    deactivate(currentIndex);
    //console.log("Got here");
    return months[monthsIndex];
}

function deactivate(monthsIndex){
    months[monthsIndex].className = "month";
    return months[monthsIndex];
}

function createMonth(month, year){
    const table = document.createElement("table");
    table.id = month;
    table.className = "month";
    const monthName = document.createElement("th");
    monthName.textContent = monthNumberToName(month) + "    " + year;
    monthName.className = "monthName";
    monthName.colSpan = 7;
    if(month !== new Date().getMonth()){
        monthName.appendChild(movePrev());
    }
    if(month !== mod((new Date().getMonth() + 11),12)){
        monthName.appendChild(moveNext());
    }
    table.appendChild(monthName);
    const body = document.createElement("tbody");

    const weekDays = createRow("weekDays");
    insertWeekDayRow(weekDays);    
    body.appendChild(weekDays);
    generateDays(month,year,body);
    table.appendChild(body);
    document.getElementById("cal").appendChild(table);
    return table;
}


function generateDays(month, year, parent){
    let daycount = daysInMonth(month,year);
    let colNum = 0;
    let dayNum = getPreviousMonthDayCount(month,year);
    let shift = getStartDateShift(year,month)
    let row = createRow("week");
    
    for(x = 0; x < shift; x++){
        row.colSpan = 7;
        const col = createColumn("lastMonth day", dayNum - shift + x + 1)
    
        col.addEventListener("click", function (event) {
            //console.log(currentIndex);
            if(currentIndex > 0){
                 activate(currentIndex - 1);
            }
           
        });
            
        row.appendChild(col);
        colNum++;
    }  
    dayNum = 1;
    for(y = 0; y < mod(colNum,7); y++){
        let day = createColumn("day", dayNum);
        const status = dayStatus(month,dayNum)
       
        if(status >= MAX || colNum > 4){
            day.className += " full"
        }
        else if(status == 0){
            day.className += " free"
        }
        else{
            day.className += " partial"
        }
        day.addEventListener("click", function(event){
            dayClick(year,month, day.textContent)
        });
        
        row.appendChild(day);
        colNum++;
        dayNum++;
        
    }
    parent.appendChild(row);
   // console.log("the month of " + monthNumberToName(month) + " in the year " + year + " has " + daysInMonth(month,year) + " days")
    //console.log("Number of rows will be:    " + rowNumCalc(month,year))
    let className =  "day";

    for(x = 0; className == "day"; x++){
        let row = createRow("week");
        
        for(colNum = 0; colNum < 7; colNum++){
            if(dayNum > daycount){
                dayNum = 1;
                className = "day nextMonth";
            }
            let column = createColumn(className, dayNum);
            if(className == "day nextMonth"){
                if(currentIndex < 11){
                    column.addEventListener("click", function (event) {
                        activate(currentIndex + 1);
                    });
                }
               
            }
            else{
                const status = dayStatus(month,dayNum)
                if(status >= MAX || colNum > 4){
                    column.className +=  " full"
                }
                else if(status == 0){
                    column.className += " free"
                }
                else{
                    column.className += " partial"
                }
                column.addEventListener("click", function(event){
                    dayClick(year,month,column.textContent);
                });
            }
            row.appendChild(column);
            dayNum++;
        }
        parent.appendChild(row);
    }

}

function updateAvailableHours(day,month,year){
    let select = document.getElementById("availableHours");
    removeOptions(select);

    let availableHours = getAvailableHours(day,month, year);
    for(p = 0; p < availableHours.length; p++){
        const option = document.createElement('option');
        option.text = availableHours[p];
        select.add(option)
    }
}

function dayClick(year, month, dayNum){
        document.getElementById("FormInputs").style.visibility = "visible"
        document.getElementById("submitButton").style.visibility = "visible"

        updateAvailableHours(dayNum,month,year);

        document.getElementById("hourDiv").style.display = "flex";

        
        const button = document.getElementById("displayedDate");
        //console.log("Day was clicked");
        document.getElementById("pickDate").style.display = "none";
        button.textContent = year + ". " + (month + 1) + ". " + dayNum;
        const date = year + "-"+numberFormat((month + 1)) + "-" + numberFormat(dayNum);
        document.getElementById("eventDate").textContent = date;
        document.getElementById("eventDate").value = date;
        document.getElementById("eventDate").innerText = date;
}

function numberFormat(number){
    result = number;
    if(number.length < 2){
        result = "0" + number;
    }
    return result;
}

function moveNext(){
    const button = document.createElement("button");
    button.textContent = "Next";
    button.className = "nextButton";
    button.addEventListener("click", function(event){
        event.preventDefault();
        activate(currentIndex + 1);
        currentIndex += 1;
    })
    return button;
}

function movePrev(){
    const button = document.createElement("button");
    button.textContent = "Previous";
    button.className = "prevButton"
    button.addEventListener("click", function(event){
        event.preventDefault()
        activate(currentIndex - 1);
        currentIndex -= 1;
    }) 
    return button;
}

function rowNumCalc(month, year){
    return Math.ceil((getStartDateShift(year,month) + daysInMonth(month,year)) / 7);
}

function getStartDateShift(year,month){
    const dayOfWeek = new Date(year, month, 0).getDay();
    return dayOfWeek;
}

function insertWeekDayRow(row){
    for(x = 0; x < 7; x++){
        const day = createColumn("WeekDay", weekDays[x]);
        row.appendChild(day);
    }
}

function getPreviousMonthDayCount(currentMonth, year){
    const month = mod((currentMonth - 1),12);
    if(month == 11){
        return daysInMonth(month,year-1);
    }
   // console.log("Previous month was " + monthNumberToName(month) + " and it had " + daysInMonth(month, year) + " days");
    return daysInMonth(month,year);
}

function mod(n, m) {
    return ((n % m) + m) % m;
  }
function createColumn(className, text){
    const column = document.createElement("td");
    column.className = className;
    column.textContent = text;
    return column;
}

function createRow(className){
    const row = document.createElement("tr");
    row.className = className;
    return row;
}

function getMonths(startMonth){
    let calenderContent = [startMonth]

    for(x = 1; x < 12; x++){
        let newMonth = mod((startMonth + x),12)
        calenderContent.push(newMonth);
    }

    return calenderContent;
}

function monthNameToNumber(name){
    switch(number){
        case "Leden":
            return 0
        case "Únor":
            return 1
        case "Březen":
            return 2
        case "Duben":
            return 3
        case "Květen"  :
            return 4
        case "Červen":
            return 5
        case "Červenec":
            return 6
        case "Srpen":
            return 7
        case "Září":
            return 8
        case "Říjen":
            return 9
        case "Listopad":
            return 10
        case "Prosinec" :
            return 11
    }
}
function monthNumberToName(number){
    switch(number){
        case 0:
            return "Leden"
        case 1:
            return "Únor"
        case 2:
            return "Březen"
        case 3:
            return "Duben"
        case 4:
            return "Květen"    
        case 5:
            return "Červen"
        case 6:
            return "Červenec"
        case 7:
            return "Srpen"
        case 8:
            return "Září"
        case 9:
            return "Říjen"
        case 10:
            return "Listopad"
        case 11:
            return "Prosinec"    
    }
}

function getEvents(params) {

}




