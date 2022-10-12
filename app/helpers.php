<?php

enum Priority: string
{
    case HIGH = "High";
    case MEDIUM = "Medium";
    case LOW = "Low";
};

enum Status: string
{
    case OPEN = "Open";
    case PROCESSING = "Processing";
    case FINISHED = "Solved";
};
