// morris chat js
var chart = new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: "chart",
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    hideHover: true,
    data: [{ period: "20/1/2021", quantity: 0, price: 0 }],
    // The name of the data record attribute that contains x-values.
    xkey: "period",
    // A list of names of data record attributes that contain y-values.
    ykeys: ["quantity", "price"],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ["Tổng số đơn đã bán", "Doanh thu "],
});
