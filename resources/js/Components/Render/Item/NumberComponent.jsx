import React from "react";

const NumberComponent = ({ number }) => {
    const formatter = new Intl.NumberFormat("id-ID");
    return <span>{formatter.format(number)}</span>;
};

export default NumberComponent;
