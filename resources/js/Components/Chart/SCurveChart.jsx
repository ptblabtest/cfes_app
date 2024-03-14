import React, { useEffect } from 'react';
import Chart from 'chart.js/auto';

const SCurveChart = () => {
    useEffect(() => {
        const ctx = document.getElementById('sCurveChart').getContext('2d');
        const sCurveChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({length: 20}, (_, i) => i), // Dummy x-values
                datasets: [{
                    label: 'S-Curve Data',
                    data: Array.from({length: 20}, (_, i) => 1 / (1 + Math.exp(-0.3*(i-10)))), // S-Curve formula
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        return () => sCurveChart.destroy();
    }, []);

    return <canvas id="sCurveChart"></canvas>;
};

export default SCurveChart;
