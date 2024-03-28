import React from "react";
import NumberInput from "./NumberInput";
import EmailInput from "./EmailInput";
import PasswordInput from "./PasswordInput";
import DateInput from "./DateInput";
import SelectInput from "./SelectInput";
import HiddenInput from "./HiddenInput";
import TextAreaInput from "./TextAreaInput";
import FileInput from "./FileInput";
import ImageInput from "./ImageInput";
import TextInput from "./TextInput";
import CurrencyInput from "./CurrencyInput";
import ModelInput from "./ModelInput";

const RenderInput = ({ name, fieldConfig, value, onChange }) => {

    switch (fieldConfig.type) {
        case "model":
            return (
                <ModelInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "text":
            return (
                <TextInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "number":
            return (
                <NumberInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "email":
            return (
                <EmailInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "password":
            return (
                <PasswordInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "date":
            return (
                <DateInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "hidden":
            return <HiddenInput name={name} value={value} />;
        case "textarea":
            return (
                <TextAreaInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "select":
            return (
                <SelectInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "related":
            return (
                <SelectInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "file":
            return (
                <FileInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "image":
            return (
                <ImageInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        case "currency":
            return (
                <CurrencyInput
                    name={name}
                    value={value}
                    onChange={onChange}
                    fieldConfig={fieldConfig}
                />
            );
        default:
            return null;
    }
};
export default RenderInput;
