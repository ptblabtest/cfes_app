import React from "react";
import { Bar, Line, Pie, Doughnut, Radar, Bubble, Scatter } from 'react-chartjs-2';

const Charts = ({ charts }) => {
  const renderChart = (type, data, options) => {
    switch (type) {
      case 'bar':
        return <Bar data={data} options={options} />;
      case 'line':
        return <Line data={data} options={options} />;
      case 'pie':
        return <Pie data={data} options={options} />;
      case 'doughnut':
        return <Doughnut data={data} options={options} />;
      case 'radar':
        return <Radar data={data} options={options} />;
      case 'bubble':
        return <Bubble data={data} options={options} />;
      case 'scatter':
        return <Scatter data={data} options={options} />;
      default:
        return <div>Unsupported chart type</div>;
    }
  };

  return (
    <div className="max-w-7xl mt-2 mx-auto sm:px-6 lg:px-8">
      <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div className="p-1">
          {charts && Object.entries(charts).map(([key, chart]) => (
            <div key={key} className="p-5 bg-white rounded shadow-sm">
              {renderChart(chart.type, chart.data, chart.options)}
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Charts;
