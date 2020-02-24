<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Objednávka</title>
   
    <script type="text/javascript" src="/~levymaty/bikegallery/models/createBikeFormElement.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/bikegallery/css/global.css"
    />
  
   
</head>
<body>
    <div class="top">
        <img src="/~levymaty/bikegallery/assets/logo.png" id="logo">   
    </div>
    <form id="Form" action="/~levymaty/bikegallery/Api/newEvent.php" method="post">
        <div id="FormInputs">
            <div id="orderInfo">
                
            </div>
            <hr>
            <div id="userInfo"></div>
            </hr>
        </div>
        <span id = "pickDate">
            <span id="cal"></span>
        </span>
        
    
    </form>
    
   
   
    <script>
        

        $(document).ready(function(){
            
            createBikeDropdownFormElement("orderInfo","Značka kola",["BMC", "CANNONDALE", "MATTS", "Raleigh", "Focus", "Felt", "Trek"], "Bike_Brand");
            createBikeDropdownFormElement("orderInfo","Typ kola",["Silniční", "MTB", "Treking", "EMTB"], "Bike_Type");
            createBikeDropdownFormElement("orderInfo","Požadovaná služba",["Garanční Servis - Zdarma", "Standardní Servis - 890Kč", "Kompletní servis - 1890"], "Service");
            createBikeTextAreaFormElement("orderInfo","Poznámka",300,6, "Description");
            createDateElements("orderInfo","Termín opravy");
            createBikeInputFormElement("userInfo","Jméno", "First_Name");
            createBikeInputFormElement("userInfo","Přijmení","Last_Name");
            createBikeInputFormElement("userInfo","Email","Email");
            createFormSubmit("Form");
            createDateSelect("orderInfo");
            createCalender();
           
           
        });

       
        
    </script>

   
   
</body>
</html>