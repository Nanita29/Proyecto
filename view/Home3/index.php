<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../node_modules/pivottable/dist/pivot.css">
    <script type="text/javascript" src="../../node_modules/pivottable/dist/pivot.js"></script>
    <script type="text/javascript" src="../../node_modules/pivottable/dist/plotly_renderers.js"></script>
</head>
 
<body>
    hola
    <div id="container"></div>
    <script>
        var myPivot = new dhx.Pivot("container", {
        data: dataset,
        fields: {
            rows: ["form", "name"],
            columns: ["year"],
            values: [{ id: "oil", method: "max" }, { id: "oil", method: "sum" }],
        },
        fieldList: [
            { id: "name", label: "name" },
            { id: "year", label: "year" },
            { id: "continent", label: "Continent" },
            // more fields
        ]
    }
    );
    </script>
</body>
</html>