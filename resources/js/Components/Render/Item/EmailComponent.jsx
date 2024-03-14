import React from "react";

const EmailComponent = ({ email }) => {
    return <a href={`mailto:${email}`}>{email}</a>;
};

export default EmailComponent;
