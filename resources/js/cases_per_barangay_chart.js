import Chart from "chart.js/auto";

const graph = document.querySelector("#blotterCasesChart");

const labels = [];
const caseCount = [];

window.addEventListener('load', async () => {
    const PATH = graph.dataset.route;

    async function fetchReports() {
        try {
            const data = await fetch(PATH, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'same-origin',
            });

            if (!data.ok) {
                const errorOptions = { status: data.status, statusText: data.statusText };
                throw errorOptions;
            }

            const response = await data.json();

            const casesPerBarangayArray = response['message'];


            casesPerBarangayArray.forEach((barangay) => {
                labels.push(barangay.name)
                caseCount.push(barangay.records_count)
            })

        } catch (error) {
            console.error(error);
        }
    }

    await fetchReports();

    const data = {
        labels: labels,
        datasets: [{
            label: 'Case Count',
            data: caseCount, 
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgba(75, 192, 192)',
                'rgba(54, 162, 235)',
                'rgba(153, 102, 255)',
                'rgba(201, 203, 207)'
            ],
        }]
    };

    const config = {
        type: "bar",
        data: data,
        options: {
            scale: {
                ticks: {
                    precision: 0
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    };

    new Chart(graph, config)
});