import React from "react";

import Label from "../Label/Label";
import SmallLabel from "../Label/SmallLabel";
import RenderInput from "./Input/RenderInput";

const InputRenderer = ({ name, fieldConfig, value, onChange }) => {

    return (
        <div>
            <Label htmlFor={name} label={fieldConfig.label} required={fieldConfig.validation?.required} />
            <RenderInput name={name} fieldConfig={fieldConfig} value={value} onChange={onChange}/>
            {(fieldConfig.smallLabel || fieldConfig.url) && (
                <SmallLabel
                    text={fieldConfig.smallLabel}
                    url={fieldConfig.url}
                    urlLabel={fieldConfig.urlLabel}
                />
            )}
        </div>
    );
};

export default InputRenderer;
