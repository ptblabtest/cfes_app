import React from "react";

const SelectComponent = ({ value }) => {
    console.log({ value });
    return <span>{value ?? "---"}</span>;
};

export default SelectComponent;
