import React from "react";

const CurrencyComponent = ({ amount }) => {
    const formatter = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    });
    return <span>{formatter.format(amount)}</span>;
};

export default CurrencyComponent;
