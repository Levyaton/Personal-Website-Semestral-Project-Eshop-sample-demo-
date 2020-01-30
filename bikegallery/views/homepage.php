<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Objednávka</title>
    <script type="text/javascript" src="/~levymaty/bikegallery/models/createBikeFormElement.js"></script>
    <link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/bikegallery/css/global.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="top">
        <img src="/~levymaty/bikegallery/assets/logo.png" id="logo">   
    </div>
    <form id="Form">
        <div id="orderInfo"></div>
        <hr>
        <div id="userInfo"></div>
        </hr>
    
    </form>
    
    
    <script>
        
        $(document).ready(function(){
            
            createBikeDropdownFormElement("orderInfo","Značka kola",["BMC", "CANNONDALE", "MATTS", "Raleigh", "Focus", "Felt", "Trek"]);
            createBikeDropdownFormElement("orderInfo","Typ kola",["Silniční", "MTB", "Treking", "EMTB"]);
            createBikeDropdownFormElement("orderInfo","Požadovaná služba",["Garanční Servis - Zdarma", "Standardní Servis - 890Kč", "Kompletní servis - 1890"]);
            createBikeTextAreaFormElement("orderInfo","Poznámka",300,6);
            createDateElements("orderInfo","Termín opravy");
            createBikeInputFormElement("userInfo","Jméno");
            createBikeInputFormElement("userInfo","Přijmení");
            createBikeInputFormElement("userInfo","Email");
            dates('option');
            months('option');
            const thisYear = new Date().getFullYear();
            years('option', thisYear, thisYear + 1);
            createFormSubmit("Form");
           
        });
        
    </script>
    <script src="/~levymaty/bikegallery/models/calender.js"></script>
</body>
</html>