import React from "react";

const DateComponent = ({ date }) => {
    return <span>{new Date(date).toLocaleDateString("id-ID")}</span>;
};

export default DateComponent;
