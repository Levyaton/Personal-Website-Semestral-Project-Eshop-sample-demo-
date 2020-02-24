const weekDays = ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"];


function daysInMonth (month, year) { 
    return new Date(year, month, 0).getDate(); 
} 

function createCalender(params) {
    let currentMonth = new Date().getMonth();
    let calenderContent = getMonths(currentMonth);
    daysInMonth(month, year)
}

function createMonth(month, year){
    const table = document.createElement("table");
    table.id = month;

    const monthName = document.createElement("thead");
    monthName.textContent = monthNumberToName(month);
    monthName.className = "monthName";
    table.appendChild(monthName);
    
    const body = document.createElement("tbody");

    const weekDays = createRow("weekDays");
    insertWeekDayRow(weekDays);
    const days = document.createElement("DIV");
    days.className = "days";
    
    

    const daycount = daysInMonth(month,year);

    table.appendChild(body);
    document.getElementById("cal").appendChild(table);
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
        let newMonth = (startMonth + x)%12
        calenderContent.push(newMonth);
    }

    return calenderContent;
}

function monthNameToNumber(name){
    switch(number){
        case "January":
            return 0
        case "February":
            return 1
        case "March":
            return 2
        case "April":
            return 3
        case "May"  :
            return 4
        case "June":
            return 5
        case "July":
            return 6
        case "August":
            return 7
        case "September":
            return 8
        case "October":
            return 9
        case "November":
            return 10
        case "December" :
            return 11
    }
}
function monthNumberToName(number){
    switch(number){
        case 0:
            return "January"
        case 1:
            return "February"
        case 2:
            return "March"
        case 3:
            return "April"
        case 4:
            return "May"    
        case 5:
            return "June"
        case 6:
            return "July"
        case 7:
            return "August"
        case 8:
            return "September"
        case 9:
            return "October"
        case 10:
            return "November"
        case 11:
            return "December"    
    }
}

function getEvents(params) {

}