import { ChartBarIcon } from "@heroicons/react/24/outline";
import React from "react";
import ItemRenderer from "../Render/ItemRenderer";

const iconMapping = {
    "chart-bar": ChartBarIcon,
};

const Metrics = ({ metrics }) => {
    return (
        <div className="max-w-7xl mt-2 mx-auto sm:px-6 lg:px-8">
            <div className="grid gap-2 sm:grid-cols-2 lg:grid-cols-2">
                {metrics &&
                    Object.entries(metrics).map(([key, value]) => (
                        <div
                            key={key}
                            className="p-5 bg-white rounded shadow-sm"
                        >
                            <div className="flex items-center space-x-4">
                                {value.icon && iconMapping[value.icon] && (
                                    <div
                                        className="flex items-center justify-center w-12 h-12 rounded-full"
                                        style={{
                                            backgroundColor:
                                                value.bgColor || "blue",
                                        }}
                                    >
                                        {React.createElement(
                                            iconMapping[value.icon],
                                            {
                                                className:
                                                    "h-6 w-6 text-gray-500",
                                            }
                                        )}
                                    </div>
                                )}
                                <div>
                                    <div className="text-gray-400">
                                        {value.description}
                                    </div>
                                    <ItemRenderer
                                        item={value}
                                        fieldKey="value"
                                        fieldConfig={{ type: value.type }}
                                    />
                                </div>
                            </div>
                        </div>
                    ))}
            </div>
        </div>
    );
};

export default Metrics;
