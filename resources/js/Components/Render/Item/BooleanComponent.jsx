import React from "react";

const BooleanComponent = ({ value }) => {
    return <span>{value ? "Yes" : "No"}</span>;
};

export default BooleanComponent;
