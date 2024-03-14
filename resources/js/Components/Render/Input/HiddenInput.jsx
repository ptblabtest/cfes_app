import React from "react";

const HiddenInput = ({ name, value }) => (
    <>
        <input id={name} type="hidden" name={name} value={value} />
    </>
);

export default HiddenInput;
