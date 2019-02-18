# Component
Easy to use state based components for vanilla php.

## The Basics

### How it works?
The main structure works like following.

```
  echo Component::get({componentName}, parameters[], options[]);
```

This function gets the file named component/{componentName}.html, 
altough you can specify the directory and the file extension in the options.

parameters[]: you specify variable with keys to use in a component.
options[]: isntead of an array if you use a string it will automatically set the state to that strng. 
But an array will override the options.
### Options
ext: specify file extension, default is "html".
dir: specifies the dir, default is "component/".
state: specifies the component state, default is "default".

### Examples
Basic usage.
```
  echo Component::get("text", [
    "value" => "This is a normal text"
  ]);
```

Defining the state.
```
  /* The easy way */
  
  echo Component::get("text", [
    "value" => "This is a link",
    "link" => "http://google.com",
    "target" => "_blank"
  ], "link");
  
  /* Defining the state in options array */
  
  echo Component::get("text", [
    "value" => "This is a link",
    "link" => "http://google.com",
    "target" => "_blank"
  ], [
    "state" => "link"
  ]);
```

## Creating a Component
A component uses some states and parameters.

###Using Multiple States
States are starting with @stateName and ends with stateName@, defaults are @default and default@
```
  @default
    ...component
  default@

  @otherState
    ...component
  otherState@
```

###Using Parameters
Parameters are defined with curly brackets as the following: {parameter}.
```
  @default
    <p>
      {text}
    </p>
  default@
```

An example of using multiple parameters to create more complex structures.
```
  @default
    <a target="{target}" href="{link}">
      {value}
    </a>
  default@
```
