/* ------------------------------------------------------------------------------
 *
 *  # Dimple.js - vertical stacked bars
 *
 *  Demo of stacked bar chart. Data stored in .tsv file format
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', function() {

    // Construct chart
    var svg = dimple.newSvg("#dimple-bar-vertical-stacked", "100%", 500);


    // Chart setup
    // ------------------------------

    d3.tsv("../../../../global_assets/demo_data/dimple/demo_data.tsv", function (data) {


        // Create chart
        // ------------------------------

        // Define chart
        var myChart = new dimple.chart(svg, data);

        // Set bounds
        myChart.setBounds(0, 0, "100%", "100%");

        // Set margins
        myChart.setMargins(70, 25, 20, 30);


        // Create axes
        // ------------------------------

        // Horizontal
        var x = myChart.addMeasureAxis("x", "Unit Sales");

        // Vertical
        var y = myChart.addCategoryAxis("y", "Month");
            y.addOrderRule("Date");


        // Construct layout
        // ------------------------------

        // Add bars
        myChart.addSeries("Channel", dimple.plot.bar);


        // Add legend
        // ------------------------------

        var myLegend = myChart.addLegend(0, 5, "100%", 0, "right");


        // Add styles
        // ------------------------------

        // Font size
        x.fontSize = "12";
        y.fontSize = "12";

        // Font family
        x.fontFamily = "Roboto";
        y.fontFamily = "Roboto";

        // Legend font style
        myLegend.fontSize = "12";
        myLegend.fontFamily = "Roboto";


        //
        // Draw chart
        //

        // Draw
        myChart.draw();

        // Remove axis titles
        x.titleShape.remove();

        // Position legend text
        myLegend.shapes.selectAll("text").attr("dy", "1");


        // Resize chart
        // ------------------------------

        // Add a method to draw the chart on resize of the window
        $(window).on('resize', resize);
        $('.sidebar-control').on('click', resize);

        // Resize function
        function resize() {

            // Redraw chart
            myChart.draw(0, true);

            // Remove axis titles
            x.titleShape.remove();

            // Position legend text
            myLegend.shapes.selectAll("text").attr("dy", "1");
        }
    });

});