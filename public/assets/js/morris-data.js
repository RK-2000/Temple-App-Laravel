 // Load the Visualization API and the corechart package
 google.charts.load('current', {'packages':['corechart']});
 // Set a callback for when the API is loaded
 google.charts.setOnLoadCallback(drawChart);
 
 // This is the callback function which actually draws the chart
 function drawChart(){
   google.visualization.drawChart({
     "containerId": containerId,
     "dataTable": data,
     "chartType": chartType,
     "options": options 
   });
 }