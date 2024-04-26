<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <title>Exercise Graphs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="pageTitle">Exercise Analysis</div>

    <div class="graph-row">
        <div id="repsGraph" class="graph-container"></div>
        <div id="durationGraph" class="graph-container"></div>
    </div>
    <br>
    <div class="container">
    <div id="datePickerContainer">
        <div>
            <label for="startDatePicker">Start Date:</label>
            <input type="date" id="startDatePicker">
        </div>
        <div>
            <label for="endDatePicker">End Date:</label>
            <input type="date" id="endDatePicker">
        </div>
        <button onclick="updateGraphs()">Search</button>
    </div>
    <br>
    <div>
        <div id="navigation">
            <button id="prevMonth">◄</button>
            <div id="header"></div>
            <button id="nextMonth">►</button>
        </div>
        <div id="calendar"></div>
        
        <script src="script.js"></script>
        </div>
    </div>
    <script>
        // Function to fetch data from the JSON file
        async function fetchData() {
            const response = await fetch('exercise_data1.json');
            const data = await response.json();
            return data;
        }

        // Function to create a Plotly graph
function createGraph(containerId, xData, yData, title, xLabel, yLabel, isDurationGraph = false) {
    const trace = {
        x: xData,
        y: yData,
        mode: 'lines+markers',
        text: isDurationGraph
            ? yData.map((value, index) => `Duration: ${value} seconds`)
            : yData.map((value, index) => `Reps: ${value}<br>Calories Burned: ${(value * 1.6534).toFixed(2)}`),
        hoverinfo: 'text',
    };

    const layout = {
        title: title,
        xaxis: {
            title: xLabel,
            rangeslider: { visible: true },
            rangeselector: {
                buttons: [
                    {
                        count: 7,
                        label: '1w',
                        step: 'day',
                        stepmode: 'backward',
                    },
                    {
                        count: 1,
                        label: '1m',
                        step: 'month',
                        stepmode: 'backward',
                    },
                    {
                        count: 3,
                        label: '3m',
                        step: 'month',
                        stepmode: 'backward',
                    },
                    {
                        count: 1,
                        label: '1y',
                        step: 'year',
                        stepmode: 'backward',
                    },
                    {
                        step: 'all',
                    },
                ],
            },
        },
        yaxis: { title: yLabel, rangemode: 'tozero' },
    };

    Plotly.newPlot(containerId, [trace], layout);
}

// Main function to load data and create graphs
async function main() {
    const data = await fetchData();

    // Extract data for reps graph
    const repsData = {
        dates: data.map(entry => entry.date),
        totalReps: data.map(entry => entry.total_left_reps + entry.total_right_reps),
    };

    // Create the reps graph with calories burned information
    createGraph(
        'repsGraph',
        repsData.dates,
        repsData.totalReps,
        'Date vs Total Reps with Calories Burned',
        'Date',
        'Count'
    );

    // Extract data for duration graph
    const durationData = {
        dates: data.map(entry => entry.date),
        timeTaken: data.map(entry => entry.time_taken),
    };

    // Create the duration graph with correct hover information
    createGraph(
        'durationGraph',
        durationData.dates,
        durationData.timeTaken,
        'Date vs Duration',
        'Date',
        'Duration (seconds)',
        true
    );
}

        // Function to update graphs based on selected date range
        function updateGraphs() {
            const startDate = document.getElementById('startDatePicker').value;
            const endDate = document.getElementById('endDatePicker').value;

            Plotly.relayout('repsGraph', {
                'xaxis.range[0]': startDate,
                'xaxis.range[1]': endDate
            });

            Plotly.relayout('durationGraph', {
                'xaxis.range[0]': startDate,
                'xaxis.range[1]': endDate
            });
        }

        // Call the main function to load data and create graphs
        main();

        document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('header');
    const calendar = document.getElementById('calendar');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');

    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth();
    let exerciseData = []; // Array to store exercise data

    // Fetch exercise data from the JSON file
    fetch('exercise_data1.json')
        .then(response => response.json())
        .then(data => {
            exerciseData = data;
            updateCalendar(); // Update calendar after fetching data
        })
        .catch(error => console.error('Error fetching exercise data:', error));

    function updateCalendar() {
        // Clear previous content
        calendar.innerHTML = '';

        // Display current month and year in the header
        header.textContent = new Date(currentYear, currentMonth).toLocaleDateString('en-US', {
            month: 'long',
            year: 'numeric'
        });

        // Populate the calendar with days
        for (let day = 1; day <= getDaysInMonth(currentYear, currentMonth); day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'day';
            dayElement.textContent = day;

            // Check if exercises were done on this day and highlight accordingly
            const currentDate = new Date(currentYear, currentMonth, day);
            if (hasExerciseData(currentDate)) {
                dayElement.classList.add('exercise-day');
            }

            // Add a hover event listener to highlight the date
            dayElement.addEventListener('mouseenter', function () {
                dayElement.style.backgroundColor = '#a0a0a0';
            });

            // Remove the highlight on mouse leave
            dayElement.addEventListener('mouseleave', function () {
                dayElement.style.backgroundColor = '';
            });

            calendar.appendChild(dayElement);
        }
    }

    function getDaysInMonth(year, month) {
        return new Date(year, month + 1, 0).getDate();
    }

    function hasExerciseData(date) {
        // Check if there is exercise data for the given date
        const formattedDate = formatDate(date);
        return exerciseData.some(entry => entry.date === formattedDate);
    }

    function formatDate(date) {
        // Format date as 'YYYY-MM-DD'
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    function updateMonth(direction) {
        if (direction === 'prev') {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
        } else {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
        }
        updateCalendar();
    }

    // Event listeners for navigation buttons
    prevMonthBtn.addEventListener('click', function () {
        updateMonth('prev');
    });

    nextMonthBtn.addEventListener('click', function () {
        updateMonth('next');
    });
});

    </script>
</body>
</html>
