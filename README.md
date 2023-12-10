# DMR-Options-Generator
DMR Options String Generator for DMRGateway / Pi-Star / MMDVM etc

Requires a JSON file / feed with the layout of https://dvsph.net/api/TalkGroups.json unless you rewrite to accommodate changes.

The DVSPH DMR network doesn't use reflectors so the reflector part of the string is fixed (StartRef=4000;RelinkTime=0;UserLink=0;), however it would be easy to adapt to suit use of reflectors where necessary.

More than 5 time slot options can be easily added by replicating the code and changing the function string.  Up to 9 (per time slot) are supported on MMDVM.


## JSON Structure Example
```
"TalkGroups": [
{
"Slot": "1",
"TalkGroup": "1",
"Description": "World-Wide Calling",
}
```

## Working Example
A working demo can be seen at [https://dvsph.net/options-generator](https://dvsph.net/options-generator)

## Contributing
PR warmly welcomed

I knocked this script up in a few hours, there are likely many better ways to achieve a better result.  I tried to keep it easy to read / modify for others to use and for future expansion.

Please feel free to contribute and customise to your needs

