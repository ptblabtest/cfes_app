import React from "react";

const ListComponent = ({ list }) => {
    return <span>{list.join(", ")}</span>;
};

export default ListComponent;
