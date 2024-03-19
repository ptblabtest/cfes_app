import React from "react";

const SelectComponent = ({ value }) => {
    return <span>{value ?? "---"}</span>;
};

export default SelectComponent;
